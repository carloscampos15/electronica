composer install

npm install

cp .env.example .env

php artisan key:generate


1. `Cd` to your Laravel app  
2. Install this preset via `composer require laravel-frontend-presets/material-dashboard`. No need to register the service provider. Laravel 5.5 & up can auto detect the package.
3. Run `php artisan preset material` command to install the Argon preset. This will install all the necessary assets and also the custom auth views, it will also add the auth route in `routes/web.php`
(NOTE: If you run this command several times, be sure to clean up the duplicate Auth entries in routes/web.php)
4. In your terminal run `composer dump-autoload`
5. Run `php artisan migrate --seed` to create basic users table