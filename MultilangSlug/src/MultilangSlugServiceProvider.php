<?php

namespace Abdulrahman\MultilangSlug;

use Illuminate\Support\ServiceProvider;

class MultilangSlugServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/multilang-slug.php', // تعديل المسار
            'multilang-slug'
        );
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/multilang-slug.php' => config_path('multilang-slug.php'),
        ], 'config');
    }
}
