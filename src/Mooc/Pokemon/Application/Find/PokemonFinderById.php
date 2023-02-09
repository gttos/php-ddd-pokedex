<?php

declare(strict_types=1);

namespace Pokedex\Mooc\Pokemon\Application\Find;

use Pokedex\Mooc\CoursesCounter\Domain\CoursesCounterNotExist;
use Pokedex\Mooc\Pokemon\Application\PokemonResponse;
use Pokedex\Mooc\Pokemon\Domain\PokemonNotFound;
use Pokedex\Mooc\Pokemon\Domain\PokemonRepository;
use Pokedex\Mooc\Shared\Domain\Pokemon\PokemonId;

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
