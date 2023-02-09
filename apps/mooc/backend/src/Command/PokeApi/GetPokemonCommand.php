<?php

declare(strict_types=1);

namespace Pokedex\Apps\Mooc\Backend\Command\PokeApi;

use Pokedex\Mooc\Pokemon\Infrastructure\Persistence\MySqlPokemonRepository;
use Pokedex\Mooc\Pokemon\Infrastructure\ThirdPartyApi\PokeApi\PokeApiRepository;
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
        private PokeApiRepository $pokeApiRepository
    ) {
        parent::__construct();
        $this
            ->addArgument('limit', InputArgument::REQUIRED, 'Amount of Pokemon to be downloaded.')
        ;
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $lastPokemon = $this->mySqlPokemonRepository->lastPokemon();
        $rangePokemon = $this->pokeApiRepository->getPokemonSet(intval($input->getArgument('limit')), $lastPokemon);

        foreach ($rangePokemon as $pokemon) {
            $output->write($pokemon->name()->value() . PHP_EOL);
            $this->mySqlPokemonRepository->save($pokemon);
        }

        return 0;
    }
}
