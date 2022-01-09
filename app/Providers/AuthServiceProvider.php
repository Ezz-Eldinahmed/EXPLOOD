<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\User;
use App\Policies\Admin;
use App\Policies\MerchantPolicy;
use App\Policies\ProductEdit;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => Admin::class,
        User::class => MerchantPolicy::class,
        Product::class => ProductEdit::class,
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
