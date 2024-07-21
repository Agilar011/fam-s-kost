<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;


class AuthServiceProvider extends ServiceProvider
{

    public static $permission = [
        'home' => [ 'admin', 'user' ],
        'index-dormitory' => ['admin',],
        'index-room' => ['admin'],
        'index-paymentlog' => ['admin'],
        'index-user' => ['admin'],
        'index-transaction' => ['admin'],
        'index-bill' => ['admin'],
        'index-price' => ['admin'],
    ];
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */

    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::before(function (User $user) {
            if ($user->role == 'superadmin') {
                return true;
            }
        });

        foreach (self::$permission as $action => $roles) {
            Gate::define($action, function (User $user) use ($roles) {
                if (in_array($user->role, $roles)){
                    return true;
                }
            });
        }
    }
}
