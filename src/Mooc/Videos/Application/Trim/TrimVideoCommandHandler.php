<?php

declare(strict_types=1);

namespace Pokedex\Mooc\Videos\Application\Trim;

use Pokedex\Mooc\Videos\Domain\VideoId;
use Pokedex\Shared\Domain\SecondsInterval;

final class TrimVideoCommandHandler
{
    public function __construct(private readonly VideoTrimmer $trimmer)
    {
    }

    public function __invoke(TrimVideoCommand $command): void
    {
        $id       = new VideoId($command->videoId());
        $interval = SecondsInterval::fromValues($command->keepFromSecond(), $command->keepToSecond());

        $this->trimmer->trim($id, $interval);
    }
}
