<?php

namespace App\Providers;

use App\ManageFiles\ViewFiles;
use Illuminate\Support\ServiceProvider;

class ViewUserFilesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ViewFiles::class, function ($app) {
            return new ViewFiles();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
