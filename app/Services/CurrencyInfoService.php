<?php

namespace App\Services;

class CurrencyInfoService
{
    /**
     * @param array       $config
     * @param CurlService $curlService
     */
    public function __construct(private array $config, private CurlService $curlService)
    {
    }

    public function getExchangeRates(): array
    {
        $live = $this->live();
        $exchangeRates = json_decode($live, true);

        $source = $exchangeRates['source'];
        $quotes = $exchangeRates['quotes'];
        $result = [];

        foreach ($quotes as $abbr => $exchangeRate) {
            $code = str_replace($source, '', $abbr);

            $result[] = [
                'code' => $code,
                'exchange_rate' => $exchangeRate,
            ];
        }

        return $result;
    }

    /**
     * @return string
     */
    private function live(): string
    {
        $endpoint = $this->config['endpoint'] . 'live';
        $options = [
            CURLOPT_HTTPHEADER => [
                "apikey: {$this->config['apikey']}",
            ],
        ];

        return $this->curlService->request(
            $endpoint,
            $options,
            ['source' => $this->config['source']]
        );
    }
}
