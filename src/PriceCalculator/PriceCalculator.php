<?php

namespace App\PriceCalculator;

interface PriceCalculator
{
    public function calculateGross(float $netPrice, TaxRateInterface $taxRate) : float;

    public function calculateNet(float $grossPrice, TaxRateInterface $taxRate) : float;
}
