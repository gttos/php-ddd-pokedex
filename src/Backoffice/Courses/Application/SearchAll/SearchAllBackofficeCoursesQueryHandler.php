<?php

declare(strict_types=1);

namespace Pokedex\Backoffice\Courses\Application\SearchAll;

use Pokedex\Backoffice\Courses\Application\BackofficeCoursesResponse;
use Pokedex\Shared\Domain\Bus\Query\QueryHandler;

final class SearchAllBackofficeCoursesQueryHandler implements QueryHandler
{
    public function __construct(private readonly AllBackofficeCoursesSearcher $searcher)
    {
    }

    public function __invoke(SearchAllBackofficeCoursesQuery $query): BackofficeCoursesResponse
    {
        return $this->searcher->searchAll();
    }
}
