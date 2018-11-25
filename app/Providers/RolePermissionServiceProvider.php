<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ProviderInjection\Permission;

class RolePermissionServiceProvider extends ServiceProvider
{
    protected $defer = false;
    
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerPermission();
        
    }


    /**
     * Register the application bindings.
     *
     * @return void
     */
    private function registerPermission()
    {
        $this->app->bind('Permission', function($app){
            return new Permission($app);
        });



        // $this->app->bind("App\ProviderInjection\Permission", function ($app) {
        //     return new Permission($app);
        // });

        // $this->app->alias('Permission', 'App\ProviderInjection\Permission');
    }

}
