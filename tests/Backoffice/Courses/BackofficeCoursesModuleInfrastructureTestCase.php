<?php

declare(strict_types=1);

namespace Pokedex\Tests\Backoffice\Courses;

use Pokedex\Backoffice\Courses\Infrastructure\Persistence\ElasticsearchBackofficeCourseRepository;
use Pokedex\Backoffice\Courses\Infrastructure\Persistence\MySqlBackofficeCourseRepository;
use Pokedex\Tests\Backoffice\Shared\Infraestructure\PhpUnit\BackofficeContextInfrastructureTestCase;
use Doctrine\ORM\EntityManager;

abstract class BackofficeCoursesModuleInfrastructureTestCase extends BackofficeContextInfrastructureTestCase
{
    protected function mySqlRepository(): MySqlBackofficeCourseRepository
    {
        return new MySqlBackofficeCourseRepository($this->service(EntityManager::class));
    }

    protected function elasticRepository(): ElasticsearchBackofficeCourseRepository
    {
        return $this->service(ElasticsearchBackofficeCourseRepository::class);
    }
}
