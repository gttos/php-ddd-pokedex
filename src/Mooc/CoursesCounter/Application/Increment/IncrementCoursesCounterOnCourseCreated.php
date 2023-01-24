<?php

declare(strict_types=1);

namespace Pokedex\Mooc\CoursesCounter\Application\Increment;

use Pokedex\Mooc\Courses\Domain\CourseCreatedDomainEvent;
use Pokedex\Mooc\Shared\Domain\Courses\CourseId;
use Pokedex\Shared\Domain\Bus\Event\DomainEventSubscriber;
use function Lambdish\Phunctional\apply;

final class IncrementCoursesCounterOnCourseCreated implements DomainEventSubscriber
{
    public function __construct(private readonly CoursesCounterIncrementer $incrementer)
    {
    }

    public static function subscribedTo(): array
    {
        return [CourseCreatedDomainEvent::class];
    }

    public function __invoke(CourseCreatedDomainEvent $event): void
    {
        $courseId = new CourseId($event->aggregateId());

        apply($this->incrementer, [$courseId]);
    }
}
