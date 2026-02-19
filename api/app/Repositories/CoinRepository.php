<?php

namespace App\Repositories;

use App\Models\Coin;
use Illuminate\Database\Eloquent\Collection;

class CoinRepository
{
    /**
     * Get all coins.
     *
     * @return \Illuminate\Database\Eloquent\Collection<int, \App\Models\Coin>
     */
    public function getAll(): Collection
    {
        return Coin::query()
            ->orderBy('market_cap_rank', 'asc')
            ->get();
    }
}