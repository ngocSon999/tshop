<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

if (!function_exists('getSetting')) {
    function getSetting(string $key, $default = '')
    {
        return Cache::remember("setting_$key", 60, function () use ($key, $default) {
            return DB::table('settings')->where('key', $key)->value('value') ?? $default;
        });
    }
}

if (!function_exists('getYear')) {
    function getYear(): string
    {
        return date('Y');
    }
}
