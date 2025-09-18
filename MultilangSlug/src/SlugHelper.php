<?php

namespace Abdulrahman\MultilangSlug;

use Illuminate\Support\Str;

class SlugHelper
{
    public static function slugify(string $text, string $locale = 'en'): string
    {
        $separator = config('multilang-slug.separator', '-');

        if ($locale === 'ar') {
            $harakat = ['َ','ً','ُ','ٌ','ِ','ٍ','ْ','ّ'];
            $text = str_replace($harakat, '', $text);

            $text = preg_replace('/[^\p{Arabic}\p{L}\p{N}]+/u', $separator, $text);
            $text = preg_replace('/'.preg_quote($separator,'/').'+/', $separator, $text);
            $text = trim($text, $separator);
            $text = mb_strtolower($text, 'UTF-8');

            return $text !== '' ? $text : config('multilang-slug.fallback_slug');
        }

        return Str::slug($text, $separator);
    }
}
