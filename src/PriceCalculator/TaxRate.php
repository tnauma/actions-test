<?php

namespace App\PriceCalculator;

class TaxRate implements TaxRateInterface
{
    private const HIGH_TAX_RATE = 19;

    public function getTaxRate(): int
    {
        return self::HIGH_TAX_RATE;
    }
}
