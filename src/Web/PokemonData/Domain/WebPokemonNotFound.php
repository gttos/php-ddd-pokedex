<?php

declare(strict_types=1);

namespace Pokedex\Web\PokemonData\Domain;

use Pokedex\Shared\Domain\DomainError;

final class WebPokemonNotFound extends DomainError
{
    public function __construct()
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'web_pokemon_not_found';
    }

    protected function errorMessage(): string
    {
        return sprintf('Pokemon not found');
    }
}
