<?php

declare(strict_types=1);

namespace Pokedex\Web\Pokemon\Application\Find;

use Pokedex\Web\CoursesCounter\Domain\CoursesCounterNotExist;
use Pokedex\Web\Pokemon\Application\PokemonResponse;
use Pokedex\Web\Pokemon\Domain\PokemonNotFound;
use Pokedex\Web\Pokemon\Domain\PokemonRepository;
use Pokedex\Web\Shared\Domain\Pokemon\PokemonId;

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
