<?php

namespace App\Services;

class CurlService
{
    private array $options = [
        CURLOPT_URL => '',
        CURLOPT_HTTPHEADER => [
            'Content-Type: text/plain',
        ],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
    ];

    public function __construct()
    {
    }

    /**
     * @param string     $endpoint
     * @param array      $options
     * @param array|null $params
     * @return string
     */
    public function request(string $endpoint, array $options, ?array $params): string
    {
        $curl = curl_init();

        if ($params) {
            $endpoint .= '?' . http_build_query($params);
        }

        $mergedOptions = array_replace_recursive(
            $this->options,
            $options,
            [
                CURLOPT_URL => $endpoint,
            ],
        );

        curl_setopt_array($curl, $mergedOptions);
        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }
}
