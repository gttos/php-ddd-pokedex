<?php

declare(strict_types=1);

namespace Pokedex\Mooc\Pokemon\Infrastructure\ThirdPartyApi\PokeApi;

use JetBrains\PhpStorm\Pure;
use \Pokedex\Mooc\Pokemon\Domain\ApiRepository;
use Pokedex\Mooc\Pokemon\Domain\Pokemon;
use Pokedex\Mooc\Pokemon\Domain\PokemonName;
use Pokedex\Mooc\Pokemon\Domain\PokemonNumber;
use Pokedex\Mooc\Shared\Domain\Pokemon\PokemonId;
use PokePHP\PokeApi;
use Ramsey\Collection\Collection;

class PokeApiRepository implements ApiRepository
{
    private PokeApi $connector;
    private const REGEX = "/(\d+)(?!.*\d)/";

    #[Pure] public function __construct()
    {
        $this->connector = new PokeApi();
    }

    public function getPokemonSet(int $limit, int $offset): Collection
    {
        $response = json_decode($this->connector->resourceList("/pokemon", $limit, $offset));

        $pokemonSet = new Collection(Pokemon::class);
        foreach ($response->results as $pokemon){
            $pokemonSet->add(Pokemon::create(
                new PokemonId(PokemonId::random()->value()),
                new PokemonName($pokemon->name),
                $this->getPokemonNumber($pokemon->url)
            ));
        }
        return $pokemonSet;
    }

    #[Pure] private function getPokemonNumber(string $url): PokemonNumber
    {
        $number = [];
        preg_match(self::REGEX, $url, $number);

        return new PokemonNumber(intval($number[0]));
    }
}
