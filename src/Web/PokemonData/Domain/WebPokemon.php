<?php

declare(strict_types=1);

namespace Pokedex\Web\PokemonData\Domain;

use Pokedex\Web\Shared\Domain\WebPokemon\WebPokemonId;
use Pokedex\Shared\Domain\Aggregate\AggregateRoot;

final class WebPokemon extends AggregateRoot
{
    public function __construct(private readonly WebPokemonId $id, private WebPokemonName $name, private WebPokemonNumber $number)
    {
    }

    public static function create(WebPokemonId $id, WebPokemonName $name, WebPokemonNumber $number): self
    {
        $pokemon = new self($id, $name, $number);
        $pokemon->record(new WebPokemonCreatedDomainEvent($id->value(), $name->value(), $number->value()));

        return $pokemon;
    }

    public function id(): WebPokemonId
    {
        return $this->id;
    }

    public function name(): WebPokemonName
    {
        return $this->name;
    }

    public function number(): WebPokemonNumber
    {
        return $this->number;
    }
}