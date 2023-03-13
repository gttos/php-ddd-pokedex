<?php

declare(strict_types=1);

namespace Pokedex\Web\PokemonData\Application\List;

use Pokedex\Web\PokemonData\Application\PokemonResponse;
use Pokedex\Web\PokemonData\Application\AllPokemonResponse;
use Pokedex\Web\PokemonData\Domain\WebPokemon;
use Pokedex\Web\PokemonData\Domain\WebPokemonDataRepository;
use function Lambdish\Phunctional\map;

final class AllPokemonSearcher
{
    public function __construct(private readonly WebPokemonDataRepository $repository)
    {
    }

    public function searchAll(): AllPokemonResponse
    {
        return new AllPokemonResponse(...map($this->toResponse(), $this->repository->searchAll()));
    }

    private function toResponse(): callable
    {
        return static fn (WebPokemon $pokemon) => new PokemonResponse(
            $pokemon->id()->value(),
            $pokemon->name()->value(),
            $pokemon->number()->value()
        );
    }
}
