<?php

declare(strict_types=1);

namespace Pokedex\Web\PokemonData\Domain;

use Pokedex\Web\Shared\Domain\WebPokemon\WebPokemonId;
use Pokedex\Shared\Domain\DomainError;

final class WebPokemonNotExist extends DomainError
{
    public function __construct(private readonly WebPokemonId $id)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'web_pokemon_not_exist';
    }

    protected function errorMessage(): string
    {
        return sprintf('The pokemon <%s> does not exist', $this->id->value());
    }
}
