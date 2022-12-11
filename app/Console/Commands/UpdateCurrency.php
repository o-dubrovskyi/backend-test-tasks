<?php

namespace App\Console\Commands;

use App\Models\Currency;
use App\Services\CurrencyInfoService;
use Illuminate\Console\Command;

class UpdateCurrency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:currency';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update currency info according to data provided by bank.';

    /**
     * @param CurrencyInfoService $currencyInfoService
     */
    public function __construct(private CurrencyInfoService $currencyInfoService)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $exchangeRates = $this->currencyInfoService->getExchangeRates();

        foreach ($exchangeRates as $exchangeRate) {
            $code = $exchangeRate['code'];
            $rate = $exchangeRate['exchange_rate'];

            $query = Currency::query();
            $currency = $query->where('code', '=', $code);

            if ($currency->get()->count()) {
                $currency->update(['exchange_rate' => $rate]);
            } else {

                Currency::factory()->createOne($exchangeRate);
            }
        }

        return Command::SUCCESS;
    }
}
