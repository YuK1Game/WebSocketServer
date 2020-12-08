<?php
namespace App\Services;

use Bref\Context\Context;
use Bref\Event\ApiGateway\WebsocketEvent;
use Bref\Event\ApiGateway\WebsocketHandler as ApiGatewayWebsocketHandler;
use Bref\Event\Http\HttpResponse;

use Bref\Websocket\WebsocketClient;

use Aws\Credentials\Credentials;
use Aws\ApiGatewayManagementApi\ApiGatewayManagementApiClient;

class WebSocketHandler extends ApiGatewayWebsocketHandler
{
    public function handleWebsocket(WebsocketEvent $event, Context $context) : HttpResponse
    {
        // $route = $event->getRouteKey();
        // $eventType = $event->getEventType();
        // $body = $event->getBody();

        var_dump([ $event, $context ]);

        // event(new \App\Events\PublicEvent());

        $apiGateway = new ApiGatewayManagementApiClient([
            'region' => config('websocket.apigateway.region', $event->getRegion()),
            'version' => 'latest',
            'endpoint' => config('websocket.apigateway.endpoint', sprintf('https://%s/%s', $event->getDomainName(), $event->getStage())),
            'credentials' => new Credentials(
                config('websocket.apigateway.key'),
                config('websocket.apigateway.secret'),
                config('websocket.apigateway.token')
            ),
        ]);

        $apiGateway->postToConnection([
            'ConnectionId' => $event->getConnectionId(),
            'Data' => json_encode(['action' => 'message', 'data' => 'Hello World!']),
        ]);

        return new HttpResponse('ok');
    }
}