<?php

declare(strict_types=1);

namespace Pokedex\Mooc\Pokemon\Infrastructure\Persistence;

use Pokedex\Mooc\Pokemon\Domain\Pokemon;
use Pokedex\Mooc\Pokemon\Domain\PokemonRepository;
use Pokedex\Mooc\Shared\Domain\Pokemon\PokemonId;

final class FilePokemonRepository implements PokemonRepository
{
    private const FILE_PATH = __DIR__ . '/pokemon';

    public function save(Pokemon $course): void
    {
        file_put_contents($this->fileName($course->id()->value()), serialize($course));
    }

    public function search(PokemonId $id): ?Pokemon
    {
        return file_exists($this->fileName($id->value()))
            ? unserialize(file_get_contents($this->fileName($id->value())))
            : null;
    }

    private function fileName(string $id): string
    {
        return sprintf('%s.%s.repo', self::FILE_PATH, $id);
    }
}
