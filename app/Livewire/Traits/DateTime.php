<?php

namespace App\Livewire\Traits;

use Exception;

trait DateTime
{
    /**
     * @param $model The model to set the value
     * @param $value The value to set
     * @return void
     * @throws \Exception
     */
    public function setDateTime($model, $value)
    {
        try {
            $split = explode('.', $model);
            $this->{$split[0]}[$split[1]] = $value;
        } catch (Exception $e) {
            log_error($e);
        }
    }
}