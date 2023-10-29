<?php

namespace Domains\Customer\Providers;


use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class CustomerServiceProvider extends ServiceProvider
{

    /**
     * @throws BindingResolutionException
     */
    public function register(): void
    {
        $this->registerMigrations();
        $this->loadViews();
    }


    /**
     * @throws BindingResolutionException
     */
    protected function registerMigrations(): void
    {
        $this->loadMigrationsFrom(base_path('Domains/Customer/Database/Migrations'));
    }

    protected function loadViews(): void
    {
        $this->loadViewsFrom(base_path('Domains/Customer/resources/views') , 'customer');
    }

//    public function boot()
//    {
//        $this->loadViewsFrom(base_path('Domains/Customer/resources/views') , 'customer');
//
//    }
}
