<?php

declare(strict_types=1);

namespace Pokedex\Shared\Domain;

interface UuidGenerator
{
    public function generate(): string;
}
