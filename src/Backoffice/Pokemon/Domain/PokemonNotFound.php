<?php

declare(strict_types=1);

namespace Pokedex\Backoffice\Pokemon\Domain;

use Pokedex\Backoffice\Shared\Domain\Pokemon\PokemonId;
use Pokedex\Shared\Domain\DomainError;

final class PokemonNotFound extends DomainError
{
    public function __construct()
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'pokemon_not_found';
    }

    protected function errorMessage(): string
    {
        return sprintf('Pokemon not found');
    }
}
