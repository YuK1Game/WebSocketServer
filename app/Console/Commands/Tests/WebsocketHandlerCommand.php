<?php

namespace App\Console\Commands\Tests;

use Illuminate\Console\Command;

use YuK1\LaravelBrefWebsockets\Handler\HandlerSwitch;
use Bref\Event\ApiGateway\WebsocketEvent;

class WebsocketHandlerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:websocket_handler';

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
        $event = new WebsocketEvent([
            'requestContext' => [
                'routeKey' => '$connect',
                'eventType' => 'CONNECT',
                'connectionId' => 'connectionId',
                'domainName' => 'localhost.ap-northeast-1.execute-api.amazon.com',
                'apiId' => 'apiId',
                'stage' => 'local',
            ],
            'queryStringParameters' => [
                'channel' => 'channel_name',
            ],
            'body' => json_encode([]),
            'isBase64encode' => false,
        ]);

        HandlerSwitch::factory($event);

        return 0;
    }
}
