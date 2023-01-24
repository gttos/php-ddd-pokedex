<?php

declare(strict_types=1);

namespace Pokedex\Tests\Shared\Infrastructure\Mockery;

use Pokedex\Tests\Shared\Infrastructure\PhpUnit\Constraint\PokedexConstraintIsSimilar;
use Mockery\Matcher\MatcherAbstract;

final class PokedexMatcherIsSimilar extends MatcherAbstract
{
    private PokedexConstraintIsSimilar $constraint;

    public function __construct($value, $delta = 0.0)
    {
        parent::__construct($value);

        $this->constraint = new PokedexConstraintIsSimilar($value, $delta);
    }

    public function match(&$actual): bool
    {
        return $this->constraint->evaluate($actual, '', true);
    }

    public function __toString(): string
    {
        return 'Is similar';
    }
}
