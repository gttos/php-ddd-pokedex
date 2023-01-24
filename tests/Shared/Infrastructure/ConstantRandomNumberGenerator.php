<?php

declare(strict_types=1);

namespace Pokedex\Tests\Shared\Infrastructure;

use Pokedex\Shared\Domain\RandomNumberGenerator;

final class ConstantRandomNumberGenerator implements RandomNumberGenerator
{
    public function generate(): int
    {
        return 1;
    }
}
