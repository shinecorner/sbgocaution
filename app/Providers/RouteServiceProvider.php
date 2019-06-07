<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapLandlordRoutes();

        $this->mapCustomerRoutes();

        $this->mapWebRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace.'\Api')
             ->group(base_path('routes/api.php'));
    }

    private function baseDomain(string $subdomain = ''): string
    {
        if (strlen($subdomain) > 0) {
            $subdomain = "{$subdomain}.";
        }

        return $subdomain . config('app.base_domain');
    }

    /**
     * Define the "login" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapLandlordRoutes()
    {
        Route::domain($this->baseDomain('laralogin'))
             ->middleware('web')
             ->namespace($this->namespace.'\Landlord')
             ->group(base_path('routes'.DIRECTORY_SEPARATOR.'landlord.php'));
    }

    /**
     * Define the "my" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapCustomerRoutes()
    {
        Route::domain($this->baseDomain('laramy'))
             ->middleware('web')
             ->namespace($this->namespace.'\Customer')
             ->group(base_path('routes'.DIRECTORY_SEPARATOR.'customer.php'));
    }

}
