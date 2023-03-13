<?php

declare(strict_types=1);

namespace Pokedex\Backoffice\Pokemon\Application\Find;

use Pokedex\Backoffice\Pokemon\Application\PokemonResponse;
use Pokedex\Backoffice\Pokemon\Domain\PokemonNotFound;
use Pokedex\Backoffice\Pokemon\Domain\PokemonNumber;
use Pokedex\Backoffice\Pokemon\Domain\PokemonRepository;

final class PokemonFinderByNumber
{
    public function __construct(private readonly PokemonRepository $repository)
    {
    }

    public function __invoke(PokemonNumber $number): PokemonResponse
    {
        $pokemon = $this->repository->searchByNumber($number);

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
