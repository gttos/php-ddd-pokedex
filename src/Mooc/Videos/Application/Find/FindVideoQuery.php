<?php

declare(strict_types=1);

namespace Pokedex\Mooc\Videos\Application\Find;

use Pokedex\Shared\Domain\Bus\Query\Query;

final class FindVideoQuery implements Query
{
    public function __construct(private readonly string $id)
    {
    }

    public function id(): string
    {
        return $this->id;
    }
}
