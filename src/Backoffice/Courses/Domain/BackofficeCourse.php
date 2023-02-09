<?php

declare(strict_types=1);

namespace Pokedex\Backoffice\Courses\Domain;

use Pokedex\Shared\Domain\Aggregate\AggregateRoot;

final class BackofficeCourse extends AggregateRoot
{
    public function __construct(
        private readonly string $id,
        private readonly string $name,
        private readonly string $duration
    ) {
    }

    public static function fromPrimitives(array $primitives): BackofficeCourse
    {
        return new self($primitives['id'], $primitives['name'], $primitives['duration']);
    }

    public function toPrimitives(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'duration' => $this->duration,
        ];
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function duration(): string
    {
        return $this->duration;
    }
}
