<?php

declare(strict_types=1);

namespace Pokedex\Mooc\Videos\Infrastructure\Persistence;

use Pokedex\Mooc\Videos\Domain\Video;
use Pokedex\Mooc\Videos\Domain\VideoId;
use Pokedex\Mooc\Videos\Domain\VideoRepository;
use Pokedex\Mooc\Videos\Domain\Videos;
use Pokedex\Shared\Domain\Criteria\Criteria;
use Pokedex\Shared\Infrastructure\Persistence\Doctrine\DoctrineCriteriaConverter;
use Pokedex\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class VideoRepositoryMySql extends DoctrineRepository implements VideoRepository
{
    private static array $criteriaToDoctrineFields = [
        'id'        => 'id',
        'type'      => 'type',
        'title'     => 'title',
        'url'       => 'url',
        'course_id' => 'courseId',
    ];

    public function save(Video $video): void
    {
        $this->persist($video);
    }

    public function search(VideoId $id): ?Video
    {
        return $this->repository(Video::class)->find($id);
    }

    public function searchByCriteria(Criteria $criteria): Videos
    {
        $doctrineCriteria = DoctrineCriteriaConverter::convert($criteria, self::$criteriaToDoctrineFields);
        $videos           = $this->repository(Video::class)->matching($doctrineCriteria)->toArray();

        return new Videos($videos);
    }
}
