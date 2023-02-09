<?php

declare(strict_types=1);

namespace Pokedex\Mooc\Pokemon\Application\Find;

use Pokedex\Mooc\Pokemon\Application\PokemonResponse;
use Pokedex\Mooc\Pokemon\Domain\PokemonNumber;
use Pokedex\Mooc\Shared\Domain\Pokemon\PokemonId;
use Pokedex\Shared\Domain\Bus\Query\QueryHandler;

final class FindPokemonQueryHandler implements QueryHandler
{
    public function __construct(
        private readonly PokemonFinderById $finderById,
        private readonly PokemonFinderByNumber $finderByNumber
    ) {
    }

    public function __invoke(FindPokemonQuery $query): PokemonResponse
    {
        if (strlen($query->id()) !== 36){
            $response = $this->finderByNumber->__invoke(new PokemonNumber(intval($query->id())));
        } else {
            $response = $this->finderById->__invoke(new PokemonId($query->id()));
        }
        return $response;
    }
}
