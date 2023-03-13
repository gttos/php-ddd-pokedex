<?php

declare(strict_types=1);

namespace Pokedex\Backoffice\Pokemon\Domain;

use Ramsey\Collection\Collection;

interface ApiRepository
{
    public function getPokemonSet(int $limit, int $offset): string;
}
