<?php

declare(strict_types=1);

namespace Pokedex\Web\Pokemon\Application\Create;

use Pokedex\Web\Pokemon\Domain\Pokemon;
use Pokedex\Web\Pokemon\Domain\PokemonName;
use Pokedex\Web\Pokemon\Domain\PokemonNumber;
use Pokedex\Web\Pokemon\Domain\PokemonRepository;
use Pokedex\Web\Shared\Domain\Pokemon\PokemonId;
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