<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * CoinResource
 * 
 * @mixin \App\Models\Coin
 */
class CoinResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'coingecko_id' => $this->coingecko_id,
            'name' => $this->name,
            'symbol' => $this->symbol,
            'description' => $this->description, //TODO: make localizations available via api request
            'image_url' => $this->image_url,
            'current_price' => $this->current_price,
            'market_cap' => $this->market_cap,
            'market_cap_rank' => $this->market_cap_rank,
            'fully_diluted_valuation' => $this->fully_diluted_valuation,
            'total_volume' => $this->total_volume,
            'high_24h' => $this->high_24h,
            'low_24h' => $this->low_24h,
            'price_change_24h' => $this->price_change_24h,
            'price_change_percentage_24h' => $this->price_change_percentage_24h,
            'market_cap_change_24h' => $this->market_cap_change_24h,
            'market_cap_change_percentage_24h' => $this->market_cap_change_percentage_24h
        ];
    }
}