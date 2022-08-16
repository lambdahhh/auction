<?php
declare(strict_types=1);

namespace App\Http\Action;

use App\Http\JsonResponse;
use JsonException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface;

class HomeAction implements RequestHandlerInterface
{
    /**
     * @throws JsonException
     */
    public function handle(Request $request): Response
    {
        return new JsonResponse([]);
    }
}
