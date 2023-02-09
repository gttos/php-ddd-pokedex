<?php

declare(strict_types=1);

namespace Pokedex\Mooc\Pokemon\Application\List;

use Pokedex\Shared\Domain\Bus\Query\Query;

final class SearchAllPokemonQuery implements Query
{
    public function __construct()
    {
    }
}
