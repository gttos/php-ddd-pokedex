<?php

declare(strict_types=1);

namespace Pokedex\Apps\Backoffice\Backend\Controller\Trainers;

use Pokedex\Backoffice\Courses\Application\BackofficeCourseResponse;
use Pokedex\Backoffice\Courses\Application\BackofficeCoursesResponse;
use Pokedex\Backoffice\Courses\Application\SearchByCriteria\SearchBackofficeCoursesByCriteriaQuery;
use Pokedex\Shared\Domain\Bus\Query\QueryBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use function Lambdish\Phunctional\map;

final class AllTrainersGetController
{
    public function __construct(private QueryBus $queryBus)
    {
    }

    public function __invoke(Request $request): JsonResponse
    {
        /** @var AllTrainersResponse $response */
        $response = $this->queryBus->ask(new SearchAllTrainersQuery());

        return new JsonResponse(
            map(
                fn(TrainerResponse $trainerResponse) => [
                    'id' => $trainerResponse->id(),
                    'name' => $trainerResponse->name(),
                    'number' => $trainerResponse->number(),
                ],
                $response->data()
            ),
            200,
            ['Access-Control-Allow-Origin' => '*']
        );
    }
}
