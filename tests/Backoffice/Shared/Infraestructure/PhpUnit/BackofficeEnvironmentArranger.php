<?php

declare(strict_types=1);

namespace Pokedex\Tests\Backoffice\Shared\Infraestructure\PhpUnit;

use Pokedex\Shared\Infrastructure\Elasticsearch\ElasticsearchClient;
use Pokedex\Tests\Shared\Infrastructure\Arranger\EnvironmentArranger;
use Pokedex\Tests\Shared\Infrastructure\Doctrine\MySqlDatabaseCleaner;
use Pokedex\Tests\Shared\Infrastructure\Elastic\ElasticDatabaseCleaner;
use Doctrine\ORM\EntityManager;
use function Lambdish\Phunctional\apply;

final class BackofficeEnvironmentArranger implements EnvironmentArranger
{
    public function __construct(private ElasticsearchClient $elasticsearchClient, private EntityManager $entityManager)
    {
    }

    public function arrange(): void
    {
        apply(new ElasticDatabaseCleaner(), [$this->elasticsearchClient]);
        apply(new MySqlDatabaseCleaner(), [$this->entityManager]);
    }

    public function close(): void
    {
    }
}
