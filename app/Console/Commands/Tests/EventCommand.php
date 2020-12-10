<?php

namespace App\Console\Commands\Tests;

use Illuminate\Console\Command;

use YuK1\LaravelBrefWebsocket\ConnectionPool\ConnectionPool;

class EventCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:event';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // \App\Events\Websockets\PublicEvent::dispatch('', '', '', '');

        $data = ConnectionPool::factory();
        dd(get_class($data));

        return 0;
    }
}
