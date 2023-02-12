<?php

namespace App\PriceCalculator;

class TaxedPriceCalculator implements PriceCalculator {


    public function calculateGross(float $netPrice, TaxRateInterface $taxRate): float
    {
        return $netPrice * $this->getTaxRateFactor($taxRate);
    }

    public function calculateNet(float $grossPrice, TaxRateInterface $taxRate): float
    {
        return $grossPrice / $this->getTaxRateFactor($taxRate);
    }

    private function getTaxRateFactor(TaxRateInterface $taxRate) : float {
        return 1 + ($taxRate->getTaxRate() / 100);
    }
}
