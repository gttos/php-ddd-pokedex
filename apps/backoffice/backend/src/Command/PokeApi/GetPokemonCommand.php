<?php

declare(strict_types=1);

namespace Pokedex\Apps\Backoffice\Backend\Command\PokeApi;

use Pokedex\Backoffice\Pokemon\Application\Create\PokemonCreator;
use Pokedex\Backoffice\Pokemon\Domain\PokemonName;
use Pokedex\Backoffice\Pokemon\Domain\PokemonNumber;
use Pokedex\Backoffice\Pokemon\Infrastructure\Persistence\MySqlPokemonRepository;
use Pokedex\Backoffice\Pokemon\Infrastructure\ThirdPartyApi\PokeApi\PokeApiRepository;
use Pokedex\Backoffice\Shared\Domain\Pokemon\PokemonId;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class GetPokemonCommand extends Command
{
    public static function getDefaultName(): string
    {
        return 'pokedex:pokeapi:get';
    }

    public function __construct(
        private MySqlPokemonRepository $mySqlPokemonRepository,
        private PokeApiRepository $pokeApiRepository,
        private PokemonCreator $pokemonCreator
    ) {
        parent::__construct();
        $this
            ->addArgument('limit', InputArgument::REQUIRED, 'Amount of Pokemon to be downloaded.');
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $lastPokemon = $this->mySqlPokemonRepository->lastPokemon();
        $response = json_decode(
            $this->pokeApiRepository->getPokemonSet(intval($input->getArgument('limit')), $lastPokemon)
        );

        foreach ($response as $pokemon) {
            $output->write($pokemon->name . PHP_EOL);
            $this->pokemonCreator->__invoke(
                new PokemonId($pokemon->id),
                new PokemonName($pokemon->name),
                new PokemonNumber($pokemon->number)
            );
        }

        return 0;
    }
}
