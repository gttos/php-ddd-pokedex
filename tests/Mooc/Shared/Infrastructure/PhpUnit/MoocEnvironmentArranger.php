<?php

declare(strict_types=1);

namespace Pokedex\Tests\Mooc\Shared\Infrastructure\PhpUnit;

use Pokedex\Tests\Shared\Infrastructure\Arranger\EnvironmentArranger;
use Pokedex\Tests\Shared\Infrastructure\Doctrine\MySqlDatabaseCleaner;
use Doctrine\ORM\EntityManager;
use function Lambdish\Phunctional\apply;

final class MoocEnvironmentArranger implements EnvironmentArranger
{
    public function __construct(private EntityManager $entityManager)
    {
    }

    public function arrange(): void
    {
        apply(new MySqlDatabaseCleaner(), [$this->entityManager]);
    }

    public function close(): void
    {
    }
}
