<?php

declare(strict_types=1);

namespace Pokedex\Tests\Shared\Infrastructure\Bus\Event\MySql;

use Pokedex\Apps\Mooc\Backend\MoocBackendKernel;
use Pokedex\Shared\Domain\Bus\Event\DomainEvent;
use Pokedex\Shared\Infrastructure\Bus\Event\DomainEventMapping;
use Pokedex\Shared\Infrastructure\Bus\Event\MySql\MySqlDoctrineDomainEventsConsumer;
use Pokedex\Shared\Infrastructure\Bus\Event\MySql\MySqlDoctrineEventBus;
use Pokedex\Tests\Mooc\Courses\Domain\CourseCreatedDomainEventMother;
use Pokedex\Tests\Mooc\CoursesCounter\Domain\CoursesCounterIncrementedDomainEventMother;
use Pokedex\Tests\Shared\Infrastructure\PhpUnit\InfrastructureTestCase;
use Doctrine\ORM\EntityManager;

final class MySqlDoctrineEventBusTest extends InfrastructureTestCase
{
    private MySqlDoctrineEventBus|null             $bus;
    private MySqlDoctrineDomainEventsConsumer|null $consumer;

    protected function setUp(): void
    {
        parent::setUp();

        $this->bus      = new MySqlDoctrineEventBus($this->service(EntityManager::class));
        $this->consumer = new MySqlDoctrineDomainEventsConsumer(
            $this->service(EntityManager::class),
            $this->service(DomainEventMapping::class)
        );
    }

    /** @test */
    public function it_should_publish_and_consume_domain_events_from_msql(): void
    {
        $domainEvent        = CourseCreatedDomainEventMother::create();
        $anotherDomainEvent = CoursesCounterIncrementedDomainEventMother::create();

        $this->bus->publish($domainEvent, $anotherDomainEvent);

        $this->consumer->consume(
            subscribers: fn (DomainEvent ...$expectedEvents) => $this->assertContainsEquals($domainEvent, $expectedEvents),
            eventsToConsume:  2
        );
    }

    protected function kernelClass(): string
    {
        return MoocBackendKernel::class;
    }
}
