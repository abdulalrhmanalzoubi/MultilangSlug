<?php

namespace Abdulrahman\MultilangSlug;

use Illuminate\Support\Facades\DB;
trait HasMultilangSlug
{
    public static function bootHasMultilangSlug()
    {
        static::saving(function ($model) {
            if (!property_exists($model, 'slugField') || !property_exists($model, 'slugSourceField')) {
                return;
            }

            $locale = $model->locale ?? config('app.locale');
            $source = $model->{$model->slugSourceField} ?? null;

            if (!$source) return;

            $baseSlug = SlugHelper::slugify($source, $locale);
            $slug = $baseSlug;
            $counter = 1;
            $separator = config('multilang-slug.separator', '-');

            while (
                DB::table($model->getTable())
                    ->where($model->slugField, $slug)
                    ->when($model->getKey(), fn($q) => $q->where('id', '!=', $model->getKey()))
                    ->exists()
            ) {
                $slug = "{$baseSlug}{$separator}{$counter}";
                $counter++;
            }

            $model->{$model->slugField} = $slug;
        });
    }
}