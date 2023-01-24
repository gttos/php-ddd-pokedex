<?php

declare(strict_types=1);

namespace Pokedex\Mooc\Videos\Infrastructure\Persistence\Doctrine;

use Pokedex\Mooc\Videos\Domain\VideoId;
use Pokedex\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class VideoIdType extends UuidType
{
    protected function typeClassName(): string
    {
        return VideoId::class;
    }
}
