<?php

namespace App\Http\Controllers;

use App\Http\Resources\CoinResource;
use App\Models\Coin;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CoinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        return CoinResource::collection(Coin::all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Coin $coin): CoinResource
    {
        return new CoinResource($coin);
    }
}
