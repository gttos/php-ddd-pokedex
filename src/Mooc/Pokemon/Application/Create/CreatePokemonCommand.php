<?php

declare(strict_types=1);

namespace Pokedex\Mooc\Pokemon\Application\Create;

use Pokedex\Shared\Domain\Bus\Command\Command;

final class CreatePokemonCommand implements Command
{
    public function __construct(private readonly string $id, private readonly string $name)
    {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }
}
