<?php

declare(strict_types=1);

namespace Pokedex\Mooc\Videos\Application\Create;

use Pokedex\Mooc\Shared\Domain\Courses\CourseId;
use Pokedex\Mooc\Shared\Domain\Videos\VideoUrl;
use Pokedex\Mooc\Videos\Domain\Video;
use Pokedex\Mooc\Videos\Domain\VideoId;
use Pokedex\Mooc\Videos\Domain\VideoRepository;
use Pokedex\Mooc\Videos\Domain\VideoTitle;
use Pokedex\Mooc\Videos\Domain\VideoType;
use Pokedex\Shared\Domain\Bus\Event\EventBus;

final class VideoCreator
{
    public function __construct(private readonly VideoRepository $repository, private readonly EventBus $bus)
    {
    }

    public function create(VideoId $id, VideoType $type, VideoTitle $title, VideoUrl $url, CourseId $courseId): void
    {
        $video = Video::create($id, $type, $title, $url, $courseId);

        $this->repository->save($video);

        $this->bus->publish(...$video->pullDomainEvents());
    }
}
