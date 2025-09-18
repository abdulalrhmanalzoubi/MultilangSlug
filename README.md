# MultilangSlug

**MultilangSlug** is a PHP package for Laravel applications that automatically generates SEO-friendly slugs for models in multiple languages, including Arabic and English. Unlike Laravel's default `Str::slug()` method, which may not handle non-Latin scripts correctly, this package ensures proper slug generation across various locales and guarantees uniqueness in the database.

---

## Features

- **Multilingual Support**: Handles multiple languages, including Arabic, without relying on transliteration.
- **Automatic Uniqueness**: Ensures that slugs are unique in your database, appending a counter if necessary.
- **Customizable Separator**: Define the word separator (e.g., `-`, `_`) for your slugs.
- **Locale Awareness**: Automatically generates slugs based on the model's locale.
- **Seamless Eloquent Integration**: Works with your models using a simple Trait.

---

## Installation

Install the package via Composer:

```bash
composer require alzoubi/multilang-slug
