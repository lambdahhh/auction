<?php

use Psr\Http\Message\ResponseFactoryInterface;

return [
    'config' => [
        'debug' => (bool) getenv('APP_DEBUG')
    ],
    ResponseFactoryInterface::class => Di\get(Slim\Psr7\Factory\ResponseFactory::class)
];
