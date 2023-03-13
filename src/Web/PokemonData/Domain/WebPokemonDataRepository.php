<?php

declare(strict_types=1);

namespace Pokedex\Web\PokemonData\Domain;

use Pokedex\Web\Shared\Domain\WebPokemon\WebPokemonId;

interface WebPokemonDataRepository
{
    public function save(WebPokemon $course): void;

    public function searchAll(): ?array;

    public function search(WebPokemonId $id): ?WebPokemon;

    public function searchByNumber(WebPokemonNumber $number): ?WebPokemon;
}
