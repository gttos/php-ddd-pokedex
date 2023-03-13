<?php

declare(strict_types=1);

namespace Pokedex\Backoffice\Pokemon\Application\Create;

use Pokedex\Backoffice\Pokemon\Domain\ApiRepository;
use Pokedex\Backoffice\Pokemon\Domain\Pokemon;
use Pokedex\Backoffice\Pokemon\Domain\PokemonName;
use Pokedex\Backoffice\Pokemon\Domain\PokemonNumber;
use Pokedex\Backoffice\Shared\Domain\Pokemon\PokemonId;
use Pokedex\Shared\Domain\Bus\Command\CommandHandler;
use Ramsey\Collection\Collection;

final class CreatePokemonCommandHandler implements CommandHandler
{
    public function __construct(
        private readonly PokemonCreator $creator,
        private readonly ApiRepository $apiRepository
    ) {
    }

    public function __invoke(CreatePokemonCommand $command): string
    {
        $response = $this->apiRepository->getPokemonSet(10 ,0);

        $pokemonSet = new Collection(Pokemon::class);
        foreach ($response->results as $pokemon){
            $pokemonSet->add(Pokemon::create(
                new PokemonId(PokemonId::random()->value()),
                new PokemonName($pokemon->name),
                $this->getPokemonNumber($pokemon->url)
            ));
        }
        return $pokemonSet;
        foreach ($pokemons as $pokemon){
            $id = new PokemonId($pokemon->id());
            $name = new PokemonName($pokemon->name());
            $number = new PokemonNumber($pokemon->number);

            $this->creator->__invoke($id, $name, $number);
        }
    }
}
