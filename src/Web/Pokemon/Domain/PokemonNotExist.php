<?php

declare(strict_types=1);

namespace Pokedex\Web\Pokemon\Domain;

use Pokedex\Web\Shared\Domain\Pokemon\PokemonId;
use Pokedex\Shared\Domain\DomainError;

final class PokemonNotExist extends DomainError
{
    public function __construct(private readonly PokemonId $id)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'pokemon_not_exist';
    }

    protected function errorMessage(): string
    {
        return sprintf('The pokemon <%s> does not exist', $this->id->value());
    }
}
