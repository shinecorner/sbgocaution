<?php

namespace App\Providers;

use Illuminate\Translation\TranslationServiceProvider;
use App\Extended\ExtendedTranslator;

class ExtendedTranslationServiceProvider extends TranslationServiceProvider
{
    public function register()
    {
        $this->registerLoader();
        $this->app->singleton('translator', function ($app) {
            $loader = $app['translation.loader'];
            $locale = $app['config']['app.locale'];
            $trans = new ExtendedTranslator($loader, $locale);
            $trans->setFallback($app['config']['app.fallback_locale']);
            return $trans;
        });
    }
}