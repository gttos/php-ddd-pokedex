<?php

declare(strict_types=1);

namespace Pokedex\Web\PokemonData\Application\Increment;

use Pokedex\Shared\Domain\Bus\Event\EventBus;
use Pokedex\Web\PokemonData\Domain\WebPokemonDataRepository;
use Pokedex\Web\PokemonData\Domain\WebPokemon;
use Pokedex\Web\PokemonData\Domain\WebPokemonName;
use Pokedex\Web\PokemonData\Domain\WebPokemonNumber;
use Pokedex\Web\Shared\Domain\WebPokemon\WebPokemonId;

final class WebPokemonSaver
{
    public function __construct(
        private readonly WebPokemonDataRepository $repository,
        private readonly EventBus $bus
    ) {
    }

    public function __invoke(WebPokemonId $pokemonId, WebPokemonName $pokemonName, WebPokemonNumber $pokemonNumber): void
    {
        if (!$this->repository->search($pokemonId)) {
            $webPokemon = new WebPokemon(
                $pokemonId,
                $pokemonName,
                $pokemonNumber
            );

            $this->repository->save($webPokemon);
            $this->bus->publish(...$webPokemon->pullDomainEvents());
        }
    }
}
