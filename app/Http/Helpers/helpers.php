<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

if (! function_exists('log_error')) {
    function log_error($e)
    {
        if ($e instanceof Exception) {
            Log::error($e->getMessage());
            Log::error($e->getTraceAsString());
        } else {
            Log::error($e);
        }
    }
}

if (! function_exists('snake_lower')) {
    function snake_lower($value)
    {
        return Str::snake(Str::lower($value));
    }
}

if (! function_exists('parse_date')) {
    function parse_date($value, ?string $format = null, ?string $tz = null)
    {
        return Carbon::parse($value, $tz)->format($format);
    }
}
