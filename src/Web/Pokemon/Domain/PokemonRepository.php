<?php

declare(strict_types=1);

namespace Pokedex\Web\Pokemon\Domain;

use Pokedex\Web\Shared\Domain\Pokemon\PokemonId;

interface PokemonRepository
{
    public function save(Pokemon $course): void;

    public function lastPokemon(): int;

    public function searchAll(): ?array;

    public function search(PokemonId $id): ?Pokemon;

    public function searchByNumber(PokemonNumber $number): ?Pokemon;
}
