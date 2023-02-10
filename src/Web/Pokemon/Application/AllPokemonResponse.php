<?php

declare(strict_types=1);

namespace Pokedex\Web\Pokemon\Application;

use Pokedex\Shared\Domain\Bus\Query\Response;

final class AllPokemonResponse implements Response
{
    private readonly array $data;

    public function __construct(PokemonResponse ...$data)
    {
        $this->data = $data;
    }

    public function data(): array
    {
        return $this->data;
    }
}
