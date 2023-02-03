<?php

namespace App\Services;

use App\Models\Option;

class OptionService
{
    protected Option $option;

    public function __construct(Option $option)
    {
        $this->option = $option;
    }

}