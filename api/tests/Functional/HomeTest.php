<?php

namespace Test\Functional;

/**
 * @coversNothing
 */
class HomeTest extends WebTestCase
{
    public function testSuccess(): void
    {
        $response = $this->app()->handle(self::json('GET', '/'));

        self::assertEquals(200, $response->getStatusCode());
        self::assertEquals('[]', $response->getBody()->getContents());
    }

    public function testMethod(): void
    {
        $response = $this->app()->handle(self::json('POST', '/'));

        self::assertEquals(405, $response->getStatusCode());
    }

    public function testNotFound(): void
    {
        $response = $this->app()->handle(self::json('GET', '/not-found'));

        self::assertEquals(404, $response->getStatusCode());
    }
}
