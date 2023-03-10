<?php

declare(strict_types=1);

namespace Pokedex\Tests\Shared\Infrastructure\Behat;

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Pokedex\Shared\Infrastructure\Bus\Event\DomainEventJsonDeserializer;
use Pokedex\Shared\Infrastructure\Bus\Event\InMemory\InMemorySymfonyEventBus;
use Pokedex\Shared\Infrastructure\Doctrine\DatabaseConnections;

final class ApplicationFeatureContext implements Context
{
    public function __construct(
        private DatabaseConnections $connections,
        private InMemorySymfonyEventBus $bus,
        private DomainEventJsonDeserializer $deserializer
    ) {
    }

    /** @BeforeScenario */
    public function cleanEnvironment(): void
    {
        $this->connections->clear();
        $this->connections->truncate();
    }

    /**
     * @Given /^I send an event to the event bus:$/
     */
    public function iSendAnEventToTheEventBus(PyStringNode $event): void
    {
        $domainEvent = $this->deserializer->deserialize($event->getRaw());

        $this->bus->publish($domainEvent);
    }
}
