<?php

declare(strict_types=1);

namespace Pokedex\Backoffice\Pokemon\Domain;

use Pokedex\Backoffice\Shared\Domain\Pokemon\PokemonId;
use Pokedex\Shared\Domain\DomainError;

final class PokemonNumberExceeded extends DomainError
{
    public function __construct(private readonly int $number)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'pokemon_number_exceeded';
    }

    protected function errorMessage(): string
    {
        return sprintf('There is not pokemon associated to this number: <%s>', $this->number);
    }
}
