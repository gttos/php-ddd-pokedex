<?php

declare(strict_types=1);

namespace Pokedex\Mooc\Pokemon\Domain;

use Pokedex\Mooc\Shared\Domain\Pokemon\PokemonId;

interface PokemonRepository
{
    public function save(Pokemon $course): void;

    public function search(PokemonId $id): ?Pokemon;
}
