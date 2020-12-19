<?php

namespace App\Providers;

use App\Project;
use App\Observers\ProjectObserver;
use Illuminate\Support\ServiceProvider;
use Knowfox\Crud\Models\Setting;
use Knowfox\Crud\Models\ConfigSetting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Project::observe(ProjectObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(Setting::class, ConfigSetting::class);
        config(['crud.theme' => 'bootstrap4']);
    }
}
