<?php

declare(strict_types=1);

namespace Pokedex\Web\PokemonData\Application\Increment;

use Pokedex\Backoffice\Pokemon\Domain\PokemonCreatedDomainEvent;
use Pokedex\Web\PokemonData\Domain\WebPokemonName;
use Pokedex\Web\PokemonData\Domain\WebPokemonNumber;
use Pokedex\Web\Shared\Domain\WebPokemon\WebPokemonId;
use Pokedex\Shared\Domain\Bus\Event\DomainEventSubscriber;
use function Lambdish\Phunctional\apply;

final class SaveWebPokemonOnPokemonCreated implements DomainEventSubscriber
{
    public function __construct(private readonly WebPokemonSaver $saver)
    {
    }

    public static function subscribedTo(): array
    {
        return [PokemonCreatedDomainEvent::class];
    }

    public function __invoke(PokemonCreatedDomainEvent $event): void
    {
        apply($this->saver, [
            new WebPokemonId($event->aggregateId()),
            new WebPokemonName($event->name()),
            new WebPokemonNumber($event->number())
        ]);
    }
}
