<?php

declare(strict_types=1);

namespace Pokedex\Analytics\DomainEvents\Application\Store;

use Pokedex\Analytics\DomainEvents\Domain\AnalyticsDomainEvent;
use Pokedex\Analytics\DomainEvents\Domain\AnalyticsDomainEventAggregateId;
use Pokedex\Analytics\DomainEvents\Domain\AnalyticsDomainEventBody;
use Pokedex\Analytics\DomainEvents\Domain\AnalyticsDomainEventId;
use Pokedex\Analytics\DomainEvents\Domain\AnalyticsDomainEventName;
use Pokedex\Analytics\DomainEvents\Domain\DomainEventsRepository;

final class DomainEventStorer
{
    public function __construct(private readonly DomainEventsRepository $repository)
    {
    }

    public function store(
        AnalyticsDomainEventId $id,
        AnalyticsDomainEventAggregateId $aggregateId,
        AnalyticsDomainEventName $name,
        AnalyticsDomainEventBody $body
    ): void {
        $domainEvent = new AnalyticsDomainEvent($id, $aggregateId, $name, $body);

        $this->repository->save($domainEvent);
    }
}
