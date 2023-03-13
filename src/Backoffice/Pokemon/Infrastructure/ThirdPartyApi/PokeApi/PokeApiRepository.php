<?php

declare(strict_types=1);

namespace Pokedex\Backoffice\Pokemon\Infrastructure\ThirdPartyApi\PokeApi;

use JetBrains\PhpStorm\Pure;
use \Pokedex\Backoffice\Pokemon\Domain\ApiRepository;
use Pokedex\Backoffice\Pokemon\Domain\Pokemon;
use Pokedex\Backoffice\Pokemon\Domain\PokemonName;
use Pokedex\Backoffice\Pokemon\Domain\PokemonNumber;
use Pokedex\Backoffice\Shared\Domain\Pokemon\PokemonId;
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

    public function getPokemonSet(int $limit, int $offset): string
    {
        $response = json_decode($this->connector->resourceList("/pokemon", $limit, $offset));

        $pokemonSet = [];
        foreach ($response->results as $pokemon){
            $pokemonSet[] = [
                'id' => PokemonId::random()->value(),
                'name' => $pokemon->name,
                'number' =>$this->getPokemonNumber($pokemon->url)
            ];
        }
        return json_encode($pokemonSet);
    }

    private function getPokemonNumber(string $url): int
    {
        $number = [];
        preg_match(self::REGEX, $url, $number);

        return intval($number[0]);
    }
}
