<?php

declare(strict_types=1);

namespace Pokedex\Backoffice\Pokemon\Application\Create;

use Pokedex\Backoffice\Pokemon\Domain\Pokemon;
use Pokedex\Backoffice\Pokemon\Domain\PokemonName;
use Pokedex\Backoffice\Pokemon\Domain\PokemonNumber;
use Pokedex\Backoffice\Pokemon\Domain\PokemonRepository;
use Pokedex\Backoffice\Shared\Domain\Pokemon\PokemonId;
use Pokedex\Shared\Domain\Bus\Event\EventBus;

final class PokemonCreator
{
    public function __construct(private readonly PokemonRepository $repository, private readonly EventBus $bus)
    {
    }

    public function __invoke(PokemonId $id, PokemonName $name, PokemonNumber $number): void
    {
        $pokemon = Pokemon::create($id, $name, $number);

        $this->repository->save($pokemon);
        $this->bus->publish(...$pokemon->pullDomainEvents());
    }
}
