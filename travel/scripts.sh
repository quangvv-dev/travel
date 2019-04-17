set -eux;
cd /var/www/app-travelnow;
git pull;
composer install;
php artisan migrate;
