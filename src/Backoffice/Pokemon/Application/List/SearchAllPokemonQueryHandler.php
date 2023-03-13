<?php

declare(strict_types=1);

namespace Pokedex\Backoffice\Pokemon\Application\List;

use Pokedex\Backoffice\Pokemon\Application\AllPokemonResponse;
use Pokedex\Shared\Domain\Bus\Query\QueryHandler;

final class SearchAllPokemonQueryHandler implements QueryHandler
{
    public function __construct(private readonly AllPokemonSearcher $searcher)
    {
    }

    public function __invoke(SearchAllPokemonQuery $query): AllPokemonResponse
    {
        return $this->searcher->searchAll();
    }
}
