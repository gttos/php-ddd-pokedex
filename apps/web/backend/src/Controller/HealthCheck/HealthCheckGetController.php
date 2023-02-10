<?php

declare(strict_types=1);

namespace Pokedex\Apps\Web\Backend\Controller\HealthCheck;

use Pokedex\Shared\Domain\RandomNumberGenerator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class HealthCheckGetController
{
    public function __construct(private RandomNumberGenerator $generator)
    {
    }

    public function __invoke(Request $request): JsonResponse
    {
        return new JsonResponse(
            [
                'web-backend' => 'ok',
                'rand'         => $this->generator->generate(),
            ]
        );
    }
}
