<?php

declare(strict_types=1);

namespace Pokedex\Mooc\Videos\Domain;

use Pokedex\Shared\Domain\Collection;

final class Videos extends Collection
{
    protected function type(): string
    {
        return Video::class;
    }
}
