<?php

declare(strict_types=1);

namespace Pokedex\Mooc\Pokemon\Infrastructure\Persistence;

use Pokedex\Mooc\Pokemon\Domain\Pokemon;
use Pokedex\Mooc\Pokemon\Domain\PokemonRepository;
use Pokedex\Mooc\Shared\Domain\Pokemon\PokemonId;
use Pokedex\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class DoctrinePokemonRepository extends DoctrineRepository implements PokemonRepository
{
    public function save(Pokemon $course): void
    {
        $this->persist($course);
    }

    public function search(PokemonId $id): ?Pokemon
    {
        return $this->repository(Pokemon::class)->find($id);
    }
}
