<?php

declare(strict_types=1);

namespace Pokedex\Tests\Mooc\Courses\Application\Update;

use Pokedex\Mooc\Courses\Application\Update\CourseRenamer;
use Pokedex\Mooc\Courses\Domain\CourseNotExist;
use Pokedex\Tests\Mooc\Courses\CoursesModuleUnitTestCase;
use Pokedex\Tests\Mooc\Courses\Domain\CourseIdMother;
use Pokedex\Tests\Mooc\Courses\Domain\CourseMother;
use Pokedex\Tests\Mooc\Courses\Domain\CourseNameMother;
use Pokedex\Tests\Shared\Domain\DuplicatorMother;

final class CourseRenamerTest extends CoursesModuleUnitTestCase
{
    private CourseRenamer|null $renamer;

    protected function setUp(): void
    {
        parent::setUp();

        $this->renamer = new CourseRenamer($this->repository(), $this->eventBus());
    }

    /** @test */
    public function it_should_rename_an_existing_course(): void
    {
        $course        = CourseMother::create();
        $newName       = CourseNameMother::create();
        $renamedCourse = DuplicatorMother::with($course, ['name' => $newName]);

        $this->shouldSearch($course->id(), $course);
        $this->shouldSave($renamedCourse);
        $this->shouldNotPublishDomainEvent();

        $this->renamer->__invoke($course->id(), $newName);
    }

    /** @test */
    public function it_should_throw_an_exception_when_the_course_not_exist(): void
    {
        $this->expectException(CourseNotExist::class);

        $id = CourseIdMother::create();

        $this->shouldSearch($id, null);

        $this->renamer->__invoke($id, CourseNameMother::create());
    }
}
