<?php

use Illuminate\Support\Facades\Log;

if (!function_exists('log_error')) {
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

if (!function_exists('snake_lower')) {
    function snake_lower($value)
    {
        return Str::snake(Str::lower($value));
    }
}
