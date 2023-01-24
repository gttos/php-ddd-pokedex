<?php

declare(strict_types=1);

namespace Pokedex\Shared\Infrastructure;

use Pokedex\Shared\Domain\RandomNumberGenerator;

final class PhpRandomNumberGenerator implements RandomNumberGenerator
{
    public function generate(): int
    {
        return random_int(1, 5);
    }
}
