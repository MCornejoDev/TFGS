<?php

use Illuminate\Support\Facades\Log;

if (!function_exists('log_error')) {
    function log_error($e)
    {
        Log::error($e->getMessage());
        Log::error($e->getTraceAsString());
    }
}
