<?php

declare(strict_types=1);

namespace Pokedex\Tests\Web\Courses\Application\Create;

use Pokedex\Web\Courses\Application\Create\CourseCreator;
use Pokedex\Web\Courses\Application\Create\CreateCourseCommandHandler;
use Pokedex\Tests\Web\Courses\CoursesModuleUnitTestCase;
use Pokedex\Tests\Web\Courses\Domain\CourseCreatedDomainEventMother;
use Pokedex\Tests\Web\Courses\Domain\CourseMother;

final class CreateCourseCommandHandlerTest extends CoursesModuleUnitTestCase
{
    private CreateCourseCommandHandler|null $handler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->handler = new CreateCourseCommandHandler(new CourseCreator($this->repository(), $this->eventBus()));
    }

    /** @test */
    public function it_should_create_a_valid_course(): void
    {
        $command = CreateCourseCommandMother::create();

        $course      = CourseMother::fromRequest($command);
        $domainEvent = CourseCreatedDomainEventMother::fromCourse($course);

        $this->shouldSave($course);
        $this->shouldPublishDomainEvent($domainEvent);

        $this->dispatch($command, $this->handler);
    }
}
