<?php

declare(strict_types=1);

namespace Pokedex\Mooc\Videos\Application\Update;

use Pokedex\Mooc\Videos\Domain\VideoFinder;
use Pokedex\Mooc\Videos\Domain\VideoId;
use Pokedex\Mooc\Videos\Domain\VideoRepository;
use Pokedex\Mooc\Videos\Domain\VideoTitle;

final class VideoTitleUpdater
{
    private readonly VideoFinder $finder;

    public function __construct(private readonly VideoRepository $repository)
    {
        $this->finder = new VideoFinder($repository);
    }

    public function __invoke(VideoId $id, VideoTitle $newTitle): void
    {
        $video = $this->finder->__invoke($id);

        $video->updateTitle($newTitle);

        $this->repository->save($video);
    }
}
