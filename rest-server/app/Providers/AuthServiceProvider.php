<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
// tambahkan ini
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // nah panggil passport:routesnya
        Passport::routes();

        // access token kita atur expirednya menjadi 1 jam 
        Passport::tokensExpireIn(now()->addHours(1));

        // sedangkan refresh token kita atur expirednya menjadi 70 menit
        Passport::refreshTokensExpireIn(now()->addMinutes(70));
    }
}
