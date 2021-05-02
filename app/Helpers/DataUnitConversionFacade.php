<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Facade;

class DataUnitConversionFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'dataUnitConversion';
    }
}
