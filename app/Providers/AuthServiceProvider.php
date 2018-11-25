<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    
    protected $policies = [
        // 'App\Models\Blog'=>'App\Policies\BlogPolicy',
        'App\Models\Role'=>'App\Policies\RolePolicy',
        'App\Models\Course'=>'App\Policies\CoursePolicy'
    ];

//    protected $policies = [
//        'App\Model' => 'App\Policies\ModelPolicy',
//    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);
        
        $gate->define('update-blog', function ($user, $blog) {
            return $user->id === $blog->user_id;
        });
        //
    }
}
