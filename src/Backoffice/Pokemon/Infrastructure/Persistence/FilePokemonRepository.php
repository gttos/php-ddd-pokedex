<?php

declare(strict_types=1);

namespace Pokedex\Backoffice\Pokemon\Infrastructure\Persistence;

use Pokedex\Backoffice\Pokemon\Domain\Pokemon;
use Pokedex\Backoffice\Pokemon\Domain\PokemonNumber;
use Pokedex\Backoffice\Pokemon\Domain\PokemonRepository;
use Pokedex\Backoffice\Shared\Domain\Pokemon\PokemonId;

final class FilePokemonRepository implements PokemonRepository
{
    private const FILE_PATH = __DIR__ . '/pokemon';

    public function save(Pokemon $course): void
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

    public function search(PokemonId $id): ?Pokemon
    {
        return file_exists($this->fileName($id->value()))
            ? unserialize(file_get_contents($this->fileName($id->value())))
            : null;
    }

    public function searchByNumber(PokemonNumber $number): ?Pokemon
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
