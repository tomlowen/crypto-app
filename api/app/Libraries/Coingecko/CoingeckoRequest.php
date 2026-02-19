<?php

namespace App\Libraries\Coingecko;

use App\Libraries\Coingecko\CoingeckoClient;

class CoingeckoRequest
{   
    /**
     * @var CoingeckoClient
     */
    private CoingeckoClient $client;

    /**
     * CoingeckoRequest constructor.
     */
    public function __construct()
    {
        $this->client = new CoingeckoClient();
    }

    /**
     * Make a GET request to the CoinGecko API.
     */
    public function get(string $uri, array $query = []): CoingeckoResponse
    {
        $response = $this->client->sendRequest('GET', $uri, $query);

        return new CoingeckoResponse($response);
    }
}