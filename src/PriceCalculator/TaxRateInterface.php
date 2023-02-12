<?php
declare(strict_types=1);

namespace App\PriceCalculator;

interface TaxRateInterface
{
    public function getTaxRate(): int;
}
