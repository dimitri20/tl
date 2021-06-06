@ECHO OFF

copy "./.env.example" "./.env"



composer update

php artisan key:generate