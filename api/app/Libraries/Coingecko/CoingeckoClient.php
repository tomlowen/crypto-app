<?php

namespace App\Libraries\Coingecko;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\PendingRequest;

class CoingeckoClient
{
    /**
     * @var PendingRequest
     */
    private PendingRequest $client;

    /**
     * CoingeckoClient constructor.
     */
    public function __construct()
    {
        $options = [
            'timeout' => 10,
        ];

        $this->client = Http::withOptions($options);
    }

    /**
     * Send a request to the Coingecko API and return the response as an associative array.
     */
    public function sendRequest(string $method, string $uri, array $query = []): array
    {
        $query = array_merge(
            $query,
            [
                'x_cg_demo_api_key' => config('services.coingecko.api_key')
            ]
        );

        $uri = config('services.coingecko.base_url') . $uri;

        try {
            $response = $this->client->send($method, $uri, [
                'query' => $query,
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (Exception $e) {
            // TODO: Log this error in an error reporting tool.
            return [
                'error' => $e->getMessage(),
                'status_code' => $e->getCode(),
            ];
        }
    }
}