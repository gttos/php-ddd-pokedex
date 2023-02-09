<?php

declare(strict_types=1);

namespace Pokedex\Mooc\Pokemon\Application\List;

use Pokedex\Mooc\Pokemon\Application\AllPokemonResponse;
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
