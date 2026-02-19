<?php

namespace App\Services;

use App\Libraries\Coingecko\CoingeckoRequest;
use App\Models\Coin;
use Illuminate\Support\Facades\Log;

class CoinService
{
    /**
     * Sync coin data from CoinGecko API and store them in the database.
     */
    public function syncCoinData(Coin $coin): bool
    {
        $client = app(CoingeckoRequest::class);

        $response = $client->get("/coins/$coin->coingecko_id", [
            'vs_currency' => 'gbp',
        ]);

        if ($response->failed()) {
            // Handle the error, e.g., log it or throw an exception
            Log::error('Failed to fetch coin data from CoinGecko', ['response' => $response->data]);

            return false;
        }

        return $coin->update([
            'name' => $response->data['name'],
            'symbol' => $response->data['symbol'],
            'description' => $response->data['description']['en'] ?? '',
            'image_url' => $response->data['image'],
            'current_price' => $response->data['current_price'],
            'market_cap' => $response->data['market_cap'],
            'market_cap_rank' => $response->data['market_cap_rank'],
            'fully_diluted_valuation' => $response->data['fully_diluted_valuation'],
            'total_volume' => $response->data['total_volume'],
            'high_24h' => $response->data['high_24h'],
            'low_24h' => $response->data['low_24h'],
            'price_change_24h' => $response->data['price_change_24h'],
            'price_change_percentage_24h' => $response->data['price_change_percentage_24h'],
            'market_cap_change_24h' => $response->data['market_cap_change_24h'],
            'market_cap_change_percentage_24h' => $response->data['market_cap_change_percentage_24h']
        ]);
    }

    /**
     * Sync coin prices from CoinGecko API and store them in the database.
     */
    public function syncPrices(): bool
    {
        $client = app(CoingeckoRequest::class);

        $response = $client->get("/coins/markets", [
            'vs_currency' => 'gbp',
        ]);

        if ($response->failed()) {
            // Handle the error, e.g., log it or throw an exception
            Log::error('Failed to fetch coin data from CoinGecko', ['response' => $response->data]);

            return false;
        }
        // TODO: get non price data from somewhere else
        foreach ($response->data as $coinData) {
            Coin::updateOrCreate(
                [
                    'coingecko_id' => $coinData['id']
                ],
                [
                    'name' => $coinData['name'],
                    'symbol' => $coinData['symbol'],
                    'description' => $coinData['description']['en'] ?? '',
                    'image_url' => $coinData['image'],
                    'current_price' => $coinData['current_price'],
                    'market_cap' => $coinData['market_cap'],
                    'market_cap_rank' => $coinData['market_cap_rank'],
                    'fully_diluted_valuation' => $coinData['fully_diluted_valuation'],
                    'total_volume' => $coinData['total_volume'],
                    'high_24h' => $coinData['high_24h'],
                    'low_24h' => $coinData['low_24h'],
                    'price_change_24h' => $coinData['price_change_24h'],
                    'price_change_percentage_24h' => $coinData['price_change_percentage_24h'],
                    'market_cap_change_24h' => $coinData['market_cap_change_24h'],
                    'market_cap_change_percentage_24h' => $coinData['market_cap_change_percentage_24h']
                ]
            );
        }

        return true;
    }
}