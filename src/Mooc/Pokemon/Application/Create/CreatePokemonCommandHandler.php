<?php

declare(strict_types=1);

namespace Pokedex\Mooc\Pokemon\Application\Create;

use Pokedex\Mooc\Pokemon\Domain\ApiRepository;
use Pokedex\Mooc\Pokemon\Domain\PokemonName;
use Pokedex\Mooc\Pokemon\Domain\PokemonNumber;
use Pokedex\Mooc\Shared\Domain\Pokemon\PokemonId;
use Pokedex\Shared\Domain\Bus\Command\CommandHandler;

final class CreatePokemonCommandHandler implements CommandHandler
{
    public function __construct(
        private readonly PokemonCreator $creator,
        private readonly ApiRepository $apiRepository
    ) {
    }

    public function __invoke(CreatePokemonCommand $command): string
    {
        $pokemons = $this->apiRepository->getPokemonSet(10 ,0);
        foreach ($pokemons as $pokemon){
            $id = new PokemonId($pokemon->id());
            $name = new PokemonName($pokemon->name());
            $number = new PokemonNumber($pokemon->number);

            $this->creator->__invoke($id, $name, $number);
        }
    }
}
