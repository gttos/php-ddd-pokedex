<?php

declare(strict_types=1);

namespace Pokedex\Backoffice\Pokemon\Application\Find;

use Pokedex\Backoffice\Pokemon\Application\PokemonResponse;
use Pokedex\Backoffice\Pokemon\Domain\PokemonNotFound;
use Pokedex\Backoffice\Pokemon\Domain\PokemonRepository;
use Pokedex\Backoffice\Shared\Domain\Pokemon\PokemonId;

final class PokemonFinderById
{
    public function __construct(private readonly PokemonRepository $repository)
    {
    }

    public function __invoke(PokemonId $id): PokemonResponse
    {
        $pokemon = $this->repository->search($id);

        if (null === $pokemon) {
            throw new PokemonNotFound();
        }

        return new PokemonResponse(
            $pokemon->id()->value(),
            $pokemon->name()->value(),
            $pokemon->number()->value()
        );
    }
}
