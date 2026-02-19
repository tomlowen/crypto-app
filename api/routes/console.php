<?php

use App\Console\Commands\SyncCoinPrices;
use Illuminate\Support\Facades\Schedule;

Schedule::command(SyncCoinPrices::class)->everyMinute();
