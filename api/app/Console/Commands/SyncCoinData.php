<?php

namespace App\Console\Commands;

use App\Services\CoinService;
use Illuminate\Console\Command;

class SyncCoinPrices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync-coin-prices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get the coin prices from CoinGecko';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $success = app(CoinService::class)->syncPrices();

        return $success ? self::SUCCESS : self::FAILURE;
    }
}
