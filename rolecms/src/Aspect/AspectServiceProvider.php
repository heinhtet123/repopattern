<?php

namespace RoleCms\Aspect;

use Illuminate\Support\ServiceProvider;
use RoleCms\Aspect\Aspect;
use RoleCms\Command\MigrationCommand;
class AspectServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;
    
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->publishes([
            __DIR__.'/../Config/aspectpermission.php' => app()->basePath() . '/config/aspectpermission.php',
        ]);

         $this->publishes([
            __DIR__.'/middleware/AspectPermission.php' => app()->basePath() . '/app/Http/Middleware/AspectPermission.php',
        ]);

        $this->commands('command.aspect.migration');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerPermission();

        $this->mergeConfig();
        
        $this->registerCommands();
    }


    /**
     * Register the application bindings.
     *
     * @return void
     */
    private function registerPermission()
    {
        $this->app->bind('Aspect', function($app){
            return new Aspect($app);
        });

    }


      /**
     * Register the artisan commands.
     *
     * @return void
     */
    private function registerCommands()
    {

        $this->app->singleton('command.aspect.migration',function($app){
            return new MigrationCommand();
        });

        //  $this->app->singleton('command.entrust.migration', function ($app) {
        //     return new MigrationCommand();
        // });
    }

    // merge the app config file and rolecms
     private function mergeConfig()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../Config/aspectpermission.php', 'aspectpermission'
        );
    }

   

    // 

}
