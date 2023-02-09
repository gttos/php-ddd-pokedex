<?php

declare(strict_types=1);

namespace Pokedex\Mooc\Pokemon\Application\Find;

use Pokedex\Mooc\CoursesCounter\Domain\CoursesCounterNotExist;
use Pokedex\Mooc\Pokemon\Application\PokemonResponse;
use Pokedex\Mooc\Pokemon\Domain\PokemonNotFound;
use Pokedex\Mooc\Pokemon\Domain\PokemonNumber;
use Pokedex\Mooc\Pokemon\Domain\PokemonRepository;
use Pokedex\Mooc\Shared\Domain\Pokemon\PokemonId;

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
