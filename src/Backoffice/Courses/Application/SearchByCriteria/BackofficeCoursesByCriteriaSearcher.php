<?php

declare(strict_types=1);

namespace Pokedex\Backoffice\Courses\Application\SearchByCriteria;

use Pokedex\Backoffice\Courses\Application\BackofficeCourseResponse;
use Pokedex\Backoffice\Courses\Application\BackofficeCoursesResponse;
use Pokedex\Backoffice\Courses\Domain\BackofficeCourse;
use Pokedex\Backoffice\Courses\Domain\BackofficeCourseRepository;
use Pokedex\Shared\Domain\Criteria\Criteria;
use Pokedex\Shared\Domain\Criteria\Filters;
use Pokedex\Shared\Domain\Criteria\Order;
use function Lambdish\Phunctional\map;

final class BackofficeCoursesByCriteriaSearcher
{
    public function __construct(private readonly BackofficeCourseRepository $repository)
    {
    }

    public function search(Filters $filters, Order $order, ?int $limit, ?int $offset): BackofficeCoursesResponse
    {
        $criteria = new Criteria($filters, $order, $offset, $limit);

        return new BackofficeCoursesResponse(...map($this->toResponse(), $this->repository->matching($criteria)));
    }

    private function toResponse(): callable
    {
        return static fn (BackofficeCourse $course) => new BackofficeCourseResponse(
            $course->id(),
            $course->name(),
            $course->duration()
        );
    }
}
