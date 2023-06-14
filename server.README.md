APP_NAME=touchngo
APP_ENV=development
APP_KEY=base64:M46og9udIo44ycUbWBkdGFCofQa6MFcso/8nBlAtdsdsGL4=
APP_DEBUG=true
APP_URL=http://159.203.177.237

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=touchngo
DB_USERNAME=gabriel
DB_PASSWORD=360_Xboxx_93

PUSHER_APP_ID="1310958"
PUSHER_APP_KEY="564c6570a0c13950eb56"
PUSHER_APP_SECRET="041d372952fbab571f03"

MIX_PUSHER_APP_KEY=564c6570a0c13950eb56
PUSHER_APP_CLUSTER="ap2"


sudo chown -R www-data.www-data /var/www/touchngo/storage
sudo chown -R www-data.www-data /var/www/touchngo/bootstrap/cache
sudo nano /etc/nginx/sites-available/touchngo

server {
    listen 80;
    server_name 159.203.177.237;
    root /var/www/touchngo/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-XSS-Protection "1; mode=block";
    add_header X-Content-Type-Options "nosniff";

    index index.html index.htm index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}


sudo ln -s /etc/nginx/sites-available/touchngo /etc/nginx/sites-enabled/

sudo apt-get install -y php8.1-cli php8.1-common php8.1-mysql php8.1-zip php8.1-gd php8.1-mbstring php8.1-curl php8.1-xml php8.1-bcmath

sudo php artisan view:cache &&
sudo php artisan route:cache &&
sudo php artisan config:cache

php artisan migrate:refresh --path=/database/migrations/2021_07_07_154824_create_orders_table.php
