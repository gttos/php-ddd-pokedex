<?php

declare(strict_types=1);

namespace Pokedex\Analytics\DomainEvents\Application\Store;

use Pokedex\Analytics\DomainEvents\Domain\AnalyticsDomainEventAggregateId;
use Pokedex\Analytics\DomainEvents\Domain\AnalyticsDomainEventBody;
use Pokedex\Analytics\DomainEvents\Domain\AnalyticsDomainEventId;
use Pokedex\Analytics\DomainEvents\Domain\AnalyticsDomainEventName;
use Pokedex\Shared\Domain\Bus\Event\DomainEvent;
use Pokedex\Shared\Domain\Bus\Event\DomainEventSubscriber;

final class StoreDomainEventOnOccurred implements DomainEventSubscriber
{
    public function __construct(private readonly DomainEventStorer $storer)
    {
    }

    public static function subscribedTo(): array
    {
        return [DomainEvent::class];
    }

    public function __invoke(DomainEvent $event): void
    {
        $id          = new AnalyticsDomainEventId($event->eventId());
        $aggregateId = new AnalyticsDomainEventAggregateId($event->aggregateId());
        $name        = new AnalyticsDomainEventName($event::eventName());
        $body        = new AnalyticsDomainEventBody($event->toPrimitives());

        $this->storer->store($id, $aggregateId, $name, $body);
    }
}
