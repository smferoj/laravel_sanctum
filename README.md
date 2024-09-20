=> RouteServiceProvider       
Route::middleware('api')
                ->prefix('api/auth')
                ->group(base_path('routes/auth.php'));

=> Database Seeder 
php artisan migrate:fresh --seed
=> composer require laravel/sanctum
=> php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
=> kernel.php (uncomment )
\Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
=> Postman 
Header (Accept => applicatin/json, Content-Type => application/json);

=> validation 
php artisan make:request LoginRequest

=> GetUser 
 Need to check authorization in postman(Select BearerToken and need to set token )