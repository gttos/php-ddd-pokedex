<?php

declare(strict_types=1);

namespace Pokedex\Backoffice\Courses\Infrastructure\Persistence;

use Pokedex\Backoffice\Courses\Domain\BackofficeCourse;
use Pokedex\Backoffice\Courses\Domain\BackofficeCourseRepository;
use Pokedex\Shared\Domain\Criteria\Criteria;
use Pokedex\Shared\Infrastructure\Persistence\Elasticsearch\ElasticsearchRepository;
use function Lambdish\Phunctional\map;

final class ElasticsearchBackofficeCourseRepository extends ElasticsearchRepository implements BackofficeCourseRepository
{
    public function save(BackofficeCourse $course): void
    {
        $this->persist($course->id(), $course->toPrimitives());
    }

    public function searchAll(): array
    {
        return map($this->toCourse(), $this->searchAllInElastic());
    }

    public function matching(Criteria $criteria): array
    {
        return map($this->toCourse(), $this->searchByCriteria($criteria));
    }

    protected function aggregateName(): string
    {
        return 'courses';
    }

    private function toCourse(): callable
    {
        return static fn (array $primitives) => BackofficeCourse::fromPrimitives($primitives);
    }
}
