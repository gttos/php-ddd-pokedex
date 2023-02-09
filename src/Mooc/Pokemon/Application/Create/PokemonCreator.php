<?php

declare(strict_types=1);

namespace Pokedex\Mooc\Pokemon\Application\Create;

use Pokedex\Mooc\Pokemon\Domain\Pokemon;
use Pokedex\Mooc\Pokemon\Domain\PokemonName;
use Pokedex\Mooc\Pokemon\Domain\PokemonNumber;
use Pokedex\Mooc\Pokemon\Domain\PokemonRepository;
use Pokedex\Mooc\Shared\Domain\Pokemon\PokemonId;
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
