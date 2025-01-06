<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class TestRedisCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redis:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test redis';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Cache::put('test_key_2', 'test value upd 2', 30);
        Cache::put('test_key_3', 'test value upd 3', 30);
        Cache::put('test_key_4', 'test value upd 4', 30);
        Cache::put('test', 'test', 30);
    }
}
