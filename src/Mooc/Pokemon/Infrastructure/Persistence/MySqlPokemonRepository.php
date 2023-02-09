<?php

declare(strict_types=1);

namespace Pokedex\Mooc\Pokemon\Infrastructure\Persistence;

use Pokedex\Backoffice\Courses\Domain\BackofficeCourse;
use Pokedex\Mooc\Pokemon\Domain\Pokemon;
use Pokedex\Mooc\Pokemon\Domain\PokemonNumber;
use Pokedex\Mooc\Pokemon\Domain\PokemonRepository;
use Pokedex\Mooc\Shared\Domain\Pokemon\PokemonId;
use Pokedex\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class MySqlPokemonRepository extends DoctrineRepository implements PokemonRepository
{
    public function save(Pokemon $course): void
    {
        $this->persist($course);
    }

    public function lastPokemon(): int
    {
        return count($this->repository(Pokemon::class)->findAll());
    }

    public function searchAll(): array
    {
        $query = $this->repository(Pokemon::class)->createQueryBuilder('p')
            ->orderBy('p.number.value', 'ASC')
            ->getQuery();
        return $query->getResult();
    }

    public function search(PokemonId $id): ?Pokemon
    {
        return $this->repository(Pokemon::class)->find($id);
    }

    /**
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function searchByNumber(PokemonNumber $number): ?Pokemon
    {
        $query = $this->repository(Pokemon::class)->createQueryBuilder('p')
            ->where('p.number.value = :number')
            ->setParameter('number', $number->value())
            ->getQuery();
        return $query->getOneOrNullResult();
    }
}
