<?php

declare(strict_types=1);

namespace Pokedex\Tests\Shared\Infrastructure\Bus\Event\RabbitMq;

use Pokedex\Mooc\Courses\Domain\CourseCreatedDomainEvent;
use Pokedex\Mooc\CoursesCounter\Domain\CoursesCounterIncrementedDomainEvent;
use Pokedex\Shared\Domain\Bus\Event\DomainEventSubscriber;

final class TestAllWorksOnRabbitMqEventsPublished implements DomainEventSubscriber
{
    public static function subscribedTo(): array
    {
        return [
            CourseCreatedDomainEvent::class,
            CoursesCounterIncrementedDomainEvent::class,
        ];
    }

    public function __invoke(CourseCreatedDomainEvent|CoursesCounterIncrementedDomainEvent $event): void
    {
    }
}
