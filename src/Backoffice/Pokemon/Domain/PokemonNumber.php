<?php

declare(strict_types=1);

namespace Pokedex\Backoffice\Pokemon\Domain;

use Pokedex\Shared\Domain\ValueObject\IntValueObject;

final class PokemonNumber extends IntValueObject
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
