<?php

declare(strict_types=1);

namespace Pokedex\Web\Pokemon\Infrastructure\Persistence;

use Pokedex\Backoffice\Courses\Domain\BackofficeCourse;
use Pokedex\Web\Pokemon\Domain\Pokemon;
use Pokedex\Web\Pokemon\Domain\PokemonNumber;
use Pokedex\Web\Pokemon\Domain\PokemonRepository;
use Pokedex\Web\Shared\Domain\Pokemon\PokemonId;
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
