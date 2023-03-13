<?php

declare(strict_types=1);

namespace Pokedex\Backoffice\Pokemon\Application\List;

use Pokedex\Backoffice\Pokemon\Application\PokemonResponse;
use Pokedex\Backoffice\Pokemon\Application\AllPokemonResponse;
use Pokedex\Backoffice\Pokemon\Domain\Pokemon;
use Pokedex\Backoffice\Pokemon\Domain\PokemonRepository;
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
