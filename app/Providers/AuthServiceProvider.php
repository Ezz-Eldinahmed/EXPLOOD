<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\User;
use App\Policies\AdminAutherizedPolicy;
use App\Policies\MerchantPolicy;
use App\Policies\ProductEdit;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => MerchantPolicy::class,
        Product::class => ProductEdit::class,
        User::class => AdminAutherizedPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
