<?php

namespace App\Libraries\Coingecko;

class CoingeckoResponse
{   
    /**
     * @var array<string, mixed>
     */
    public array $data;

    /**
     * CoingeckoRequest constructor.
     */
    public function __construct(array $response)
    {
        $this->data = $response;
    }

    /**
     * Check if the response has failed (i.e., contains an error).
     */
    public function failed(): bool
    {
        return isset($this->data['error']);
    }
}