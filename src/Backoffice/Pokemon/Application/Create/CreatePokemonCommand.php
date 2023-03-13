<?php

declare(strict_types=1);

namespace Pokedex\Backoffice\Pokemon\Application\Create;

use Pokedex\Shared\Domain\Bus\Command\Command;

final class CreatePokemonCommand implements Command
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
