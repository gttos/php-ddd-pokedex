<?php

declare(strict_types=1);

namespace Pokedex\Web\PokemonData\Domain;

use Pokedex\Shared\Domain\DomainError;

final class WebPokemonNumberExceeded extends DomainError
{
    public function __construct(private readonly int $number)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'web_pokemon_number_exceeded';
    }

    protected function errorMessage(): string
    {
        return sprintf('There is not pokemon associated to this number: <%s>', $this->number);
    }
}
