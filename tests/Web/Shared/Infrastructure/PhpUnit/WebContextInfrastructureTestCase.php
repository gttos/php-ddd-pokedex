<?php

declare(strict_types=1);

namespace Pokedex\Tests\Web\Shared\Infrastructure\PhpUnit;

use Pokedex\Apps\Web\Backend\WebBackendKernel;
use Pokedex\Tests\Shared\Infrastructure\PhpUnit\InfrastructureTestCase;
use Doctrine\ORM\EntityManager;

abstract class WebContextInfrastructureTestCase extends InfrastructureTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $arranger = new WebEnvironmentArranger($this->service(EntityManager::class));

        $arranger->arrange();
    }

    protected function tearDown(): void
    {
        $arranger = new WebEnvironmentArranger($this->service(EntityManager::class));

        $arranger->close();

        parent::tearDown();
    }

    protected function kernelClass(): string
    {
        return WebBackendKernel::class;
    }
}
