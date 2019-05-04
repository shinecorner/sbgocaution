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
        $this->mapCrmRoutes();

        $this->mapLaraloginRoutes();

        $this->mapLaramyRoutes();

        $this->mapApiRoutes();

        $this->mapWebRoutes();
    }

    private function baseDomain(string $subdomain = ''): string
    {
        if (strlen($subdomain) > 0) {
            $subdomain = "{$subdomain}.";
        }

        return $subdomain . config('app.base_domain');
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
        Route::domain($this->baseDomain())
             ->middleware('web')
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

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapCrmRoutes()
    {
        Route::domain($this->baseDomain('crm'))
             ->middleware('web')
             ->namespace($this->namespace.'\Crm')
             ->group(base_path('routes'.DIRECTORY_SEPARATOR.'web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapLaraloginRoutes()
    {
        Route::domain($this->baseDomain('laralogin'))
             ->middleware('web')
             ->namespace($this->namespace.'\Laralogin')
             ->group(base_path('routes'.DIRECTORY_SEPARATOR.'laralogin.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapLaramyRoutes()
    {
        Route::domain($this->baseDomain('laramy'))
             ->middleware('web')
             ->namespace($this->namespace.'\Laramy')
             ->group(base_path('routes'.DIRECTORY_SEPARATOR.'laramy.php'));
    }

}
