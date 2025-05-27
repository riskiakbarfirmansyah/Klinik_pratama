cp .env.example .env
composer install
# npm install
php artisan migrate
php artisan db:seed
php artisan key:generate
php artisan storage:link
