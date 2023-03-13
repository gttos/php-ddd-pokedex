<?php

declare(strict_types=1);

namespace Pokedex\Web\PokemonData\Domain;

use Pokedex\Shared\Domain\ValueObject\IntValueObject;

final class WebPokemonNumber extends IntValueObject
{
    public function __construct(int $number)
    {
        $this->validate($number);

        parent::__construct($number);
    }

    private function validate(int $number)
    {
        if ($number > 1279){
            throw new PokemonNumberExceeded($number);
        }
    }
}
