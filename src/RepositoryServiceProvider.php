<?php

namespace Iwanli\Repository;

use Illuminate\Support\ServiceProvider;
use Iwanli\Repository\Commands\RepositoryCommand;
use Iwanli\Repository\Commands\ServiceCommand;
use Iwanli\Repository\Commands\PresenterCommand;
use Iwanli\Repository\Commands\CriteriaCommand;
use Iwanli\Repository\Commands\TraitCommand;
use Iwanli\Repository\Commands\EntityCommand;
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/any.php' => config_path('any.php')
        ], 'any');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                RepositoryCommand::class,
                ServiceCommand::class,
                PresenterCommand::class,
                CriteriaCommand::class,
                TraitCommand::class,
                EntityCommand::class,
            ]);
        }
    }
}
