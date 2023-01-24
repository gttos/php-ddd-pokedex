<?php

declare(strict_types=1);

namespace Pokedex\Tests\Mooc\Courses;

use Pokedex\Mooc\Courses\Domain\CourseRepository;
use Pokedex\Tests\Mooc\Shared\Infrastructure\PhpUnit\MoocContextInfrastructureTestCase;

abstract class CoursesModuleInfrastructureTestCase extends MoocContextInfrastructureTestCase
{
    protected function repository(): CourseRepository
    {
        return $this->service(CourseRepository::class);
    }
}
