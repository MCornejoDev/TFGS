<?php

use Illuminate\Support\Facades\Log;

if (!function_exists('error_log')) {
    function error_log($e)
    {
        Log::error($e->getMessage());
        Log::error($e->getTraceAsString());
    }
}
