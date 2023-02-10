<?php

declare(strict_types=1);

namespace Pokedex\Web\CoursesCounter\Domain;

use Pokedex\Shared\Domain\ValueObject\IntValueObject;

final class CoursesCounterTotal extends IntValueObject
{
    public static function initialize(): self
    {
        return new self(0);
    }

    public function increment(): self
    {
        return new self($this->value() + 1);
    }
}
