<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
 //use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    
    public function boot()
    {

        //

         // $user=Auth::user();

          //var_dump($user);die;
          //return view(['user_name',$user->name]);

        // view()->share('haha', "ll");
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
