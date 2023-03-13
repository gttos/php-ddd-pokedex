<?php

declare(strict_types=1);

namespace Pokedex\Backoffice\Pokemon\Domain;

use Pokedex\Shared\Domain\Bus\Event\DomainEvent;

final class PokemonCreatedDomainEvent extends DomainEvent
{
    public function __construct(
        string $id,
        private readonly string $name,
        private readonly int $number,
        string $eventId = null,
        string $occurredOn = null
    ) {
        parent::__construct($id, $eventId, $occurredOn);
    }

    public static function eventName(): string
    {
        return 'pokemon.created';
    }

    public static function fromPrimitives(
        string $aggregateId,
        array $body,
        string $eventId,
        string $occurredOn
    ): DomainEvent {
        return new self($aggregateId, $body['name'], $body['number'], $eventId, $occurredOn);
    }

    public function toPrimitives(): array
    {
        return [
            'name' => $this->name,
            'number' => $this->number,
        ];
    }

    public function name(): string
    {
        return $this->name;
    }

    public function number(): int
    {
        return $this->number;
    }
}
