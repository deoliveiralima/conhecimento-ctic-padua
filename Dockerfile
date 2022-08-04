FROM php:7.4-apache

# Arguments defined in docker-compose.yml
ARG user
ARG uid

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    libpq-dev \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install mbstring exif pcntl bcmath gd

RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer



# 2. Apache configs + document root.
RUN echo "ServerName laravel-app.local" >> /etc/apache2/apache2.conf

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 3. mod_rewrite for URL rewrite and mod_headers for .htaccess extra headers like Access-Control-Allow-Origin-
RUN a2enmod rewrite headers

# 4. Start with base PHP config, then add extensions.
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

# 5. Composer.
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

#copirar arquivos para a pasta dentro do container
WORKDIR /var/www/html/
COPY ./docker/custom_files/files/app/ /var/www/html/

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u 1000 -d /home/admin admin
RUN mkdir -p /home/admin/.composer && \
    chown -R admin:admin /home/admin && \
    chown -R admin:admin /var/www/html




ADD ./docker/custom_files/files/init.sh /home/
RUN chmod +x /home/init.sh
ENTRYPOINT ["/home/init.sh"]

USER "admin"

