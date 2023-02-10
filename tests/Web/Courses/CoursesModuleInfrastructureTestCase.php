<?php

declare(strict_types=1);

namespace Pokedex\Tests\Web\Courses;

use Pokedex\Web\Courses\Domain\CourseRepository;
use Pokedex\Tests\Web\Shared\Infrastructure\PhpUnit\WebContextInfrastructureTestCase;

abstract class CoursesModuleInfrastructureTestCase extends WebContextInfrastructureTestCase
{
    protected function repository(): CourseRepository
    {
        return $this->service(CourseRepository::class);
    }
}
