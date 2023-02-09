<?php

declare(strict_types=1);

namespace Pokedex\Mooc\Pokemon\Domain;

use Pokedex\Mooc\Shared\Domain\Pokemon\PokemonId;
use Pokedex\Shared\Domain\Aggregate\AggregateRoot;

final class Pokemon extends AggregateRoot
{
    public function __construct(private readonly PokemonId $id, private PokemonName $name, private PokemonNumber $number)
    {
    }

    public static function create(PokemonId $id, PokemonName $name, PokemonNumber $number): self
    {
        $pokemon = new self($id, $name, $number);
        $pokemon->record(new PokemonCreatedDomainEvent($id->value(), $name->value(), $number->value()));

        return $pokemon;
    }

    public function id(): PokemonId
    {
        return $this->id;
    }

    public function name(): PokemonName
    {
        return $this->name;
    }

    public function number(): PokemonNumber
    {
        return $this->number;
    }
}