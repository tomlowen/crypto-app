<?php

namespace App\Http\Controllers;

use App\Http\Resources\CoinResource;
use App\Models\Coin;
use App\Repositories\CoinRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Request;

class CoinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CoinRepository $coinRepository): AnonymousResourceCollection
    {
        return CoinResource::collection($coinRepository->getAll());
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $coingeckoId): CoinResource
    {
        $coin = Coin::where('coingecko_id', $coingeckoId)->firstOrFail();  
        
        return new CoinResource($coin);
    }
}
