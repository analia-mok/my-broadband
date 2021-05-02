<?php

namespace App\Helpers;

/**
 * Helper class to perform unit conversions for data.
 *
 * Note: If using VSCode and want to use this helper's facade,
 * use the DataUnitConversionFacade and alias as DataUnitConversion.
 */
class DataUnitConversion
{

    private $MB_TO_BYTES = 1000000;
    private $GB_TO_BYTES = 1000000000;

    public function bytesToMB($bytes)
    {
        return $bytes / $this->MB_TO_BYTES;
    }

    public function mbToBytes($mb)
    {
        return $mb * $this->MB_TO_BYTES;
    }

    public function bytesToGB($bytes)
    {
        return $bytes / $this->GB_TO_BYTES;
    }

    public function gbToBytes($gb)
    {
        return $gb * $this->GB_TO_BYTES;
    }
}
