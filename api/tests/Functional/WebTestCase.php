<?php

namespace Test\Functional;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;
use Slim\Psr7\Factory\ServerRequestFactory;

class WebTestCase extends TestCase
{
    protected function app(): App
    {
        $container = require __DIR__ . '/../../config/container.php';
        return (require __DIR__ . '/../../config/app.php')($container);
    }

    protected static function json(string $method, string $path): ServerRequestInterface
    {
        return self::request($method, $path)
            ->withHeader('Accept', 'application/json')
            ->withHeader('Content-Type', 'application/json');
    }

    protected static function request(string $method, string $path): ServerRequestInterface
    {
        return (new ServerRequestFactory())->createServerRequest($method, $path);
    }

}
