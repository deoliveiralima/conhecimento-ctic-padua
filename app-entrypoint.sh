#!/bin/bash

cd /var/www/html/
composer install --optimize-autoloader --no-dev
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan config:clear
php artisan view:clear
sleep 30 &&
php artisan migrate
php artisan db:seed --class=AdminSeeder 
php artisan db:seed --class=CategoriasSeeder
php artisan config:cache
php artisan route:cache
php artisan view:cache


/usr/sbin/apache2ctl -D FOREGROUND