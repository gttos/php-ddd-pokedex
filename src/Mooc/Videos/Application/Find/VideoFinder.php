<?php

declare(strict_types=1);

namespace Pokedex\Mooc\Videos\Application\Find;

use Pokedex\Mooc\Videos\Domain\VideoFinder as DomainVideoFinder;
use Pokedex\Mooc\Videos\Domain\VideoId;
use Pokedex\Mooc\Videos\Domain\VideoRepository;

final class VideoFinder
{
    private readonly DomainVideoFinder $finder;

    public function __construct(VideoRepository $repository)
    {
        $this->finder = new DomainVideoFinder($repository);
    }

    public function __invoke(VideoId $id)
    {
        return $this->finder->__invoke($id);
    }
}
