<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'name' => $this->name,
            'symbol' => $this->symbol,
            'price' => $this->price,
            'market_cap' => $this->market_cap,
            'volume' => $this->volume,
            'change' => $this->change,
            'description' => $this->description->en, //TODO: make localizations available via api request
        ];
    }
}