<?php

declare(strict_types=1);

namespace Pokedex\Mooc\Pokemon\Application\List;

use Pokedex\Mooc\Pokemon\Application\AllPokemonResponse;
use Pokedex\Mooc\Pokemon\Application\PokemonResponse;
use Pokedex\Mooc\Pokemon\Domain\Pokemon;
use Pokedex\Mooc\Pokemon\Domain\PokemonRepository;
use function Lambdish\Phunctional\map;

final class AllPokemonSearcher
{
    public function __construct(private readonly PokemonRepository $repository)
    {
    }

    public function searchAll(): AllPokemonResponse
    {
        return new AllPokemonResponse(...map($this->toResponse(), $this->repository->searchAll()));
    }

    private function toResponse(): callable
    {
        return static fn (Pokemon $pokemon) => new PokemonResponse(
            $pokemon->id()->value(),
            $pokemon->name()->value(),
            $pokemon->number()->value()
        );
    }
}
