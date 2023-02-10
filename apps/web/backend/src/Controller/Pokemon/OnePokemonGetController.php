<?php

declare(strict_types=1);

namespace Pokedex\Apps\Web\Backend\Controller\Pokemon;

use JetBrains\PhpStorm\ArrayShape;
use Pokedex\Web\Pokemon\Application\Find\FindPokemonQuery;
use Pokedex\Web\Pokemon\Application\PokemonResponse;
use Pokedex\Web\Pokemon\Domain\PokemonNotFound;
use Pokedex\Shared\Infrastructure\Symfony\ApiController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class OnePokemonGetController extends ApiController
{
    public function __invoke(string $id, Request $request): JsonResponse
    {
        /** @var PokemonResponse $pokemonResponse */
        $pokemonResponse = $this->ask(new FindPokemonQuery($id));

        return new JsonResponse(
            [
                'id' => $pokemonResponse->id(),
                'name' => $pokemonResponse->name(),
                'number' => $pokemonResponse->number()
            ]
        );
    }

    #[ArrayShape([PokemonNotFound::class => "int"])] protected function exceptions(): array
    {
        return [
            PokemonNotFound::class => Response::HTTP_NOT_FOUND,
        ];
    }
}
