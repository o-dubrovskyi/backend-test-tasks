<?php

namespace App\Services;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Builder;

class ProductPriceService
{
    public function __construct()
    {
        bcscale(2);
    }

    /**
     * @param string $price
     * @param        $sourceCurrency
     * @param        $targetCurrency
     * @return string
     */
    public function calculate(string $price, $sourceCurrency, $targetCurrency): string
    {
        $sourceQuery = Currency::query()
            ->where('code', '=', $sourceCurrency);
        $targetQuery = Currency::query()
            ->where('code', '=', $targetCurrency);

        $this->validateCurrencies($sourceCurrency, $targetCurrency, $sourceQuery, $targetQuery);

        $sourceExchangeRate = $sourceQuery->get()->value('exchange_rate');
        $targetExchangeRate = $targetQuery->get()->value('exchange_rate');

        $sourcePrice = bcdiv($price, number_format($sourceExchangeRate, 9, thousands_separator: ''));
        $targetPrice = bcmul($sourcePrice, number_format($targetExchangeRate, 9, thousands_separator: ''));

        return $this->round($targetPrice);
    }

    /**
     * @param string $price
     * @return string
     */
    private function round(string $price): string
    {
        $numberCount = strlen(
            str_replace('.', '', $price)
        );

        $round = function (int $length) use ($price) {
            $realValue = substr($price, 0, $length);
            $remainValue = substr($price, $length);
            $zeroValue = preg_replace('/\d/', '0', $remainValue);

            return $realValue . $zeroValue;
        };

        if ($numberCount <= 3) {
            $roundedPrice = $round(1 === $numberCount ? 1 : $numberCount - 1);
        } else if ($numberCount <= 8) {
            $roundedPrice = $round(3);
        } else {
            $roundedPrice = $round(9);
        }

        return $roundedPrice;
    }

    /**
     * @param string  $sourceCurrency
     * @param string  $targetCurrency
     * @param Builder $sourceQuery
     * @param Builder $targetQuery
     * @return void
     */
    private function validateCurrencies(
        string $sourceCurrency,
        string $targetCurrency,
        Builder $sourceQuery,
        Builder $targetQuery,
    ): void {
        if (!$sourceQuery->get()->count()) {
            throw new \UnexpectedValueException("Unexpected source currency: $targetCurrency.");
        }

        if (!$targetQuery->get()->count()) {
            throw new \UnexpectedValueException("Unexpected target currency: $sourceCurrency.");
        }
    }
}
