<?php

declare(strict_types=1);

namespace Pokedex\Apps\Web\Backend\Controller\CoursesCounter;

use Pokedex\Web\CoursesCounter\Application\Find\CoursesCounterResponse;
use Pokedex\Web\CoursesCounter\Application\Find\FindCoursesCounterQuery;
use Pokedex\Web\CoursesCounter\Domain\CoursesCounterNotExist;
use Pokedex\Shared\Infrastructure\Symfony\ApiController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class CoursesCounterGetController extends ApiController
{
    public function __invoke(): JsonResponse
    {
        /** @var CoursesCounterResponse $response */
        $response = $this->ask(new FindCoursesCounterQuery());

        return new JsonResponse(
            [
                'total' => $response->total(),
            ]
        );
    }

    protected function exceptions(): array
    {
        return [
            CoursesCounterNotExist::class => Response::HTTP_NOT_FOUND,
        ];
    }
}
