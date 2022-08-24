<?php

namespace Test\Unit\Http;

use App\Http\JsonResponse;
use PHPUnit\Framework\TestCase;

class JsonResponseTest extends TestCase
{
    public function testInt(): void
    {
        $response = new JsonResponse(12);

        self::assertEquals('12', $response->getBody()->getContents());
        self::assertEquals(200, $response->getStatusCode());
    }

    public function testIntWithCode(): void
    {
        $response = new JsonResponse(13, 201);

        self::assertEquals('13', $response->getBody()->getContents());
        self::assertEquals(201, $response->getStatusCode());
    }
}
