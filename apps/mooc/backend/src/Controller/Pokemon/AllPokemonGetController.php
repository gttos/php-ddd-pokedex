<?php

declare(strict_types=1);

namespace Pokedex\Apps\Mooc\Backend\Controller\Pokemon;

use Pokedex\Mooc\Pokemon\Application\AllPokemonResponse;
use Pokedex\Mooc\Pokemon\Application\List\SearchAllPokemonQuery;
use Pokedex\Mooc\Pokemon\Application\PokemonResponse;
use Pokedex\Shared\Domain\Bus\Query\QueryBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use function Lambdish\Phunctional\map;

final class AllPokemonGetController
{
    public function __construct(private QueryBus $queryBus)
    {
    }

    public function __invoke(Request $request): JsonResponse
    {
        /** @var AllPokemonResponse $response */
        $response = $this->queryBus->ask(new SearchAllPokemonQuery());

        return new JsonResponse(
            map(
                fn(PokemonResponse $pokemonResponse) => [
                    'id' => $pokemonResponse->id(),
                    'name' => $pokemonResponse->name(),
                    'number' => $pokemonResponse->number(),
                ],
                $response->data()
            ),
            200,
            ['Access-Control-Allow-Origin' => '*']
        );
    }
}
