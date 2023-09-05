<?php

namespace App\Providers;

use Spatie\Permission\Models\Role;
use Illuminate\Support\ServiceProvider;

class RoleProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if (!Role::where('name', 'staff')->exists()) {
            Role::create(['name' => 'staff']);
        }

        if (!Role::where('name', 'pediatrician')->exists()) {
            Role::create(['name' => 'pediatrician']);
        }

        if (!Role::where('name', 'patient')->exists()) {
            Role::create(['name' => 'patient']);
        }
    }
}
