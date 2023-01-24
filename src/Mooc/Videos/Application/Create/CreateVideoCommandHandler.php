<?php

declare(strict_types=1);

namespace Pokedex\Mooc\Videos\Application\Create;

use Pokedex\Mooc\Shared\Domain\Courses\CourseId;
use Pokedex\Mooc\Shared\Domain\Videos\VideoUrl;
use Pokedex\Mooc\Videos\Domain\VideoId;
use Pokedex\Mooc\Videos\Domain\VideoTitle;
use Pokedex\Mooc\Videos\Domain\VideoType;
use Pokedex\Shared\Domain\Bus\Command\CommandHandler;

final class CreateVideoCommandHandler implements CommandHandler
{
    public function __construct(private readonly VideoCreator $creator)
    {
    }

    public function __invoke(CreateVideoCommand $command): void
    {
        $id       = new VideoId($command->id());
        $type     = new VideoType($command->type());
        $title    = new VideoTitle($command->title());
        $url      = new VideoUrl($command->url());
        $courseId = new CourseId($command->courseId());

        $this->creator->create($id, $type, $title, $url, $courseId);
    }
}
