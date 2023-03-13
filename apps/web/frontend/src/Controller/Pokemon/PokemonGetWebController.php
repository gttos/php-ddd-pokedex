<?php

declare(strict_types=1);

namespace Pokedex\Apps\Web\Frontend\Controller\Pokemon;

use Pokedex\Shared\Infrastructure\Symfony\WebController;
use Pokedex\Web\PokemonData\Application\AllPokemonResponse;
use Pokedex\Web\PokemonData\Application\List\SearchAllPokemonQuery;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class PokemonGetWebController extends WebController
{
    public function __invoke(Request $request): Response
    {
        /** @var AllPokemonResponse $pokemonResponse */
        $pokemonResponse = $this->ask(new SearchAllPokemonQuery());

        return $this->render(
            'pages/pokemon.html.twig',
            [
                'title'       => 'Pokemon',
                'description' => 'Pokedex - Backoffice',
                'pokemon' => $pokemonResponse->data()
            ]
        );
    }

    protected function exceptions(): array
    {
        return [];
    }
}
