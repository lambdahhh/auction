<?php

use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

http_response_code(500);

require __DIR__ . '/../vendor/autoload.php';

$builder = new DI\ContainerBuilder();
$builder->addDefinitions([
    'config' => [
        'debug' => (bool) getenv('APP_DEBUG')
    ]
]);

$container = $builder->build();

$app = AppFactory::create(null, $container);

$app->addErrorMiddleware($container->get('config')['debug'], true, true);

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("{}");
    return $response->withHeader('Content-Type', 'application/json');
});

$app->run();
