<?php

namespace Debixy\Plugins;

use Debixy\Plugins\Console\Commands\GeneratePluginCommand;
use Debixy\Plugins\Console\Commands\RemovePluginCommand;
use Illuminate\Support\ServiceProvider;

class PluginsServiceProvider extends ServiceProvider
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
        if ($this->app->runningInConsole()) {
            $this->commands([
                GeneratePluginCommand::class,
                RemovePluginCommand::class,
            ]);
        }
    }
}
