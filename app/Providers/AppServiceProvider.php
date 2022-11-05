<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        Schema::defaultStringLength(191);

        Vite::useScriptTagAttributes([
            'defer' => true, // Specify an attribute without a value...
        ]);

        Blade::directive('inertua', function ($expression) {

            $id = trim(trim($expression), "\'\"") ?: 'app';

            $template = '<?php
                if (!isset($__inertiaSsr)) {
                    $__inertiaSsr = app(\Inertia\Ssr\Gateway::class)->dispatch($page);
                }

                if ($__inertiaSsr instanceof \Inertia\Ssr\Response) {
                    echo $__inertiaSsr->body;
                } else {
                    ?><div id="'.$id.'" data-page="{{ json_encode($page) }}"></div><?php
                }
            ?>';

            return implode(' ', array_map('trim', explode("\n", $template)));

        });

        Blade::directive('inertuaHead', function ($expression) {
            $template = '<?php
            if (!isset($__inertiaSsr)) {
                $__inertiaSsr = app(\Inertia\Ssr\Gateway::class)->dispatch($page);
            }

            if ($__inertiaSsr instanceof \Inertia\Ssr\Response) {
                echo $__inertiaSsr->head;
            }
        ?>';

        return implode(' ', array_map('trim', explode("\n", $template)));

        });
    }
}
