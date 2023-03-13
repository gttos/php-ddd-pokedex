<?php

declare(strict_types=1);

namespace Pokedex\Web\PokemonData\Infrastructure\Persistence;

use Pokedex\Web\PokemonData\Domain\WebPokemon;
use Pokedex\Web\PokemonData\Domain\WebPokemonDataRepository;
use Pokedex\Web\PokemonData\Domain\WebPokemonNumber;
use Pokedex\Web\Shared\Domain\WebPokemon\WebPokemonId;

final class FilePokemonRepository implements WebPokemonDataRepository
{
    private const FILE_PATH = __DIR__ . '/pokemon';

    public function save(WebPokemon $course): void
    {
        file_put_contents($this->fileName($course->id()->value()), serialize($course));
    }

    public function lastPokemon(): int
    {
        return 1;
    }

    public function searchAll(): array
    {
        return [];
    }

    public function search(WebPokemonId $id): ?WebPokemon
    {
        return file_exists($this->fileName($id->value()))
            ? unserialize(file_get_contents($this->fileName($id->value())))
            : null;
    }

    public function searchByNumber(WebPokemonNumber $number): ?WebPokemon
    {
        return file_exists($this->fileName(strval($number->value())))
            ? unserialize(file_get_contents($this->fileName(strval($number->value()))))
            : null;
    }

    private function fileName(string $id): string
    {
        return sprintf('%s.%s.repo', self::FILE_PATH, $id);
    }
}
