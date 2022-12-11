<?php

namespace Database\Seeders;

use App\Models\Currency;
use App\Services\CurrencyInfoService;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * @return void
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function run()
    {
        /** @var CurrencyInfoService $currencyInfoService */
        $currencyInfoService = $this->container->get(CurrencyInfoService::class);
        $exchangeRates = $currencyInfoService->getExchangeRates();

        Currency::factory()->createMany($exchangeRates);
    }
}
