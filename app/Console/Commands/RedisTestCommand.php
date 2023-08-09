<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Cache\Events\CacheHit;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class RedisTestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redis:go';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $posts = Post::factory(1000)->make();

        $before = microtime(true);
        Cache::put('posts:all', $posts);
        $after = microtime(true);

        dd($after - $before);
    }
}
