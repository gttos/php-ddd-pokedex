<?php

declare(strict_types=1);

namespace Pokedex\Tests\Backoffice\Shared\Infraestructure\PhpUnit;

use Pokedex\Apps\Backoffice\Backend\BackofficeBackendKernel;
use Pokedex\Shared\Infrastructure\Elasticsearch\ElasticsearchClient;
use Pokedex\Tests\Shared\Infrastructure\PhpUnit\InfrastructureTestCase;
use Doctrine\ORM\EntityManager;

abstract class BackofficeContextInfrastructureTestCase extends InfrastructureTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $arranger = new BackofficeEnvironmentArranger(
            $this->service(ElasticsearchClient::class),
            $this->service(EntityManager::class)
        );

        $arranger->arrange();
    }

    protected function kernelClass(): string
    {
        return BackofficeBackendKernel::class;
    }
}
