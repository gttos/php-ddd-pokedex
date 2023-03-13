<?php

declare(strict_types=1);

namespace Pokedex\Web\PokemonData\Application;

use Pokedex\Shared\Domain\Bus\Query\Response;

final class PokemonResponse implements Response
{
    public function __construct(
        private readonly string $id,
        private readonly string $name,
        private readonly int $number
    ) {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function number(): int
    {
        return $this->number;
    }
}
