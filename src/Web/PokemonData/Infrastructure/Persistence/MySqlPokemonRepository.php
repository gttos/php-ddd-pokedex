<?php

declare(strict_types=1);

namespace Pokedex\Web\PokemonData\Infrastructure\Persistence;

use Pokedex\Web\PokemonData\Domain\WebPokemon;
use Pokedex\Web\PokemonData\Domain\WebPokemonNumber;
use Pokedex\Web\PokemonData\Domain\WebPokemonDataRepository;
use Pokedex\Web\Shared\Domain\WebPokemon\WebPokemonId;
use Pokedex\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class MySqlPokemonRepository extends DoctrineRepository implements WebPokemonDataRepository
{
    public function save(WebPokemon $course): void
    {
        $this->persist($course);
    }

    public function lastPokemon(): int
    {
        return count($this->repository(WebPokemon::class)->findAll());
    }

    public function searchAll(): array
    {
        $query = $this->repository(WebPokemon::class)->createQueryBuilder('p')
            ->orderBy('p.number.value', 'ASC')
            ->getQuery();
        return $query->getResult();
    }

    public function search(WebPokemonId $id): ?WebPokemon
    {
        return $this->repository(WebPokemon::class)->find($id);
    }

    /**
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function searchByNumber(WebPokemonNumber $number): ?WebPokemon
    {
        $query = $this->repository(WebPokemon::class)->createQueryBuilder('p')
            ->where('p.number.value = :number')
            ->setParameter('number', $number->value())
            ->getQuery();
        return $query->getOneOrNullResult();
    }
}
