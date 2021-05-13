#php artisan migrate:rollback --env=testing
#php artisan migrate:fresh --env=testing
php artisan cache:clear
php artisan migrate:fresh --env=testing
php artisan test --env=testing
