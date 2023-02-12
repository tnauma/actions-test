<?php
declare(strict_types=1);

namespace App\Tests\PriceCalculator;

use App\PriceCalculator\TaxedPriceCalculator;
use App\PriceCalculator\TaxRate;
use App\PriceCalculator\TaxRateInterface;
use PHPUnit\Framework\TestCase;

class TaxedPriceCalculatorTest extends TestCase
{

    /**
     * @var TaxedPriceCalculator
     */
    private TaxedPriceCalculator $priceCalculator;

    private function getZeroTaxRate() : TaxRateInterface {
        return new Class implements TaxRateInterface {

            public function getTaxRate(): int
            {
                return 0;
            }
        };
    }

    public function setUp() : void
    {
        $this->priceCalculator = new TaxedPriceCalculator();
    }

    public function testZeroTaxGross() : void
    {
        $input = 100.0;
        $grossPrice = $this->priceCalculator->calculateGross($input, $this->getZeroTaxRate());

        self::assertSame($input, $grossPrice);
    }

    public function testZeroTaxNet() : void
    {
        $input = 100.0;
        $grossPrice = $this->priceCalculator->calculateGross($input, $this->getZeroTaxRate());

        self::assertSame($input, $grossPrice);
    }

    public function testGermanTaxGross() : void
    {
        $input = 100.0;
        $grossPrice = $this->priceCalculator->calculateGross($input, new TaxRate());

        self::assertSame(119.0, $grossPrice);
    }

    public function testGermanTaxNet() : void
    {
        $input = 119.0;
        $grossPrice = $this->priceCalculator->calculateNet($input, new TaxRate());

        self::assertSame(100.0, $grossPrice);
    }
}
