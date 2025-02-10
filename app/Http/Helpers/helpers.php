<?php

use Illuminate\Http\UploadedFile;
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
        if (empty($value)) {
            return '';
        }

        try {
            // Intenta parsear la fecha usando Carbon con el timezone si está disponible
            $date = Carbon::parse($value, $tz);

            // Si el formato es proporcionado, devuelve la fecha formateada
            return $format ? $date->format($format) : $date;
        } catch (\Exception $e) {
            // Si falla al parsear, devuelve un valor predeterminado o maneja el error
            return '';
        }
    }
}

if (!function_exists('store_file')) {
    function store_file(string $path, UploadedFile $file, string $filename)
    {
        return Storage::disk('public')->putFileAs($path, $file,  $filename);
    }
}
