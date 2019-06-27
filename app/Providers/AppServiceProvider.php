<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Observers\ContactObserver;
use App\Contact;
use App\Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(255);
        if(Schema::hasTable('configs')) {
            config(Config::all(['option', 'value'])
                ->keyBy('option')
                ->transform(function ($config) {
                     return $config->value;
                })->toArray());
        }

        Contact::observe(ContactObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
