#!/bin/bash


cd /var/www/html/
#git clone https://github.com/deoliveiralima/conhecimento-ctic-padua.git ./
cp ./.env.example ./.env 
echo "" >> .env
echo "DB_CONNECTION=$DB_CONNECTION" >> .env
echo "DB_HOST=$DB_HOST" >> .env
echo "DB_PORT=$DB_PORT" >> .env
echo "DB_DATABASE=$DB_DATABASE" >> .env
echo "DB_USERNAME=$DB_USERNAME" >> .env
echo "DB_PASSWORD"=$DB_PASSWORD >> .env


composer install --optimize-autoloader --no-dev
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan config:clear
php artisan view:clear
#cp /home/.env /var/www/html/.env 
php artisan key:generate
php artisan config:cache
php artisan route:cache
php artisan view:cache
 
/usr/sbin/apache2ctl -D FOREGROUND