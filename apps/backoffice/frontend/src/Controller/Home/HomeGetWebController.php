<?php

declare(strict_types=1);

namespace Pokedex\Apps\Backoffice\Frontend\Controller\Home;

use Pokedex\Shared\Infrastructure\Symfony\WebController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class HomeGetWebController extends WebController
{
    public function __invoke(Request $request): Response
    {
        return $this->render(
            'pages/home.html.twig',
            [
                'title'       => 'Welcome',
                'description' => 'Pokedex - Backoffice',
            ]
        );
    }

    protected function exceptions(): array
    {
        return [];
    }
}
