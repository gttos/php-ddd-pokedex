<?php

declare(strict_types=1);

namespace Pokedex\Mooc\Videos\Application\Trim;

use Pokedex\Mooc\Videos\Domain\VideoId;
use Pokedex\Shared\Domain\SecondsInterval;

final class VideoTrimmer
{
    public function trim(VideoId $id, SecondsInterval $interval): void
    {
    }
}
