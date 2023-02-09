<?php

declare(strict_types=1);

namespace Pokedex\Mooc\Pokemon\Infrastructure\ThirdPartyApi\PokeApi;

use Pokedex\Shared\Domain\Bus\Query\Response;

final class PokeApiResponse implements Response
{
    public function __construct(
        private readonly array $data,
        private readonly int $total,
        private readonly ?string $next,
        private readonly ?string $previous
    ) {
    }

    public function next(): ?string
    {
        return $this->next;
    }

    public function previous(): ?string
    {
        return $this->previous;
    }

    public function data(): array
    {
        return $this->data;
    }

    public function total(): int
    {
        return $this->total;
    }
}
