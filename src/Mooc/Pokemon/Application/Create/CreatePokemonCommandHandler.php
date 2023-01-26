<?php

declare(strict_types=1);

namespace Pokedex\Mooc\Pokemon\Application\Create;

use Pokedex\Mooc\Pokemon\Domain\PokemonName;
use Pokedex\Mooc\Shared\Domain\Pokemon\PokemonId;
use Pokedex\Shared\Domain\Bus\Command\CommandHandler;

final class CreatePokemonCommandHandler implements CommandHandler
{
    public function __construct(private readonly PokemonCreator $creator)
    {
    }

    public function __invoke(CreatePokemonCommand $command): void
    {
        $id = new PokemonId($command->id());
        $name = new PokemonName($command->name());

        $this->creator->__invoke($id, $name);
    }
}
