<?php

declare(strict_types=1);

namespace Pokedex\Backoffice\Courses\Application\SearchByCriteria;

use Pokedex\Backoffice\Courses\Application\BackofficeCoursesResponse;
use Pokedex\Shared\Domain\Bus\Query\QueryHandler;
use Pokedex\Shared\Domain\Criteria\Filters;
use Pokedex\Shared\Domain\Criteria\Order;

final class SearchBackofficeCoursesByCriteriaQueryHandler implements QueryHandler
{
    public function __construct(private readonly BackofficeCoursesByCriteriaSearcher $searcher)
    {
    }

    public function __invoke(SearchBackofficeCoursesByCriteriaQuery $query): BackofficeCoursesResponse
    {
        $filters = Filters::fromValues($query->filters());
        $order   = Order::fromValues($query->orderBy(), $query->order());

        return $this->searcher->search($filters, $order, $query->limit(), $query->offset());
    }
}
