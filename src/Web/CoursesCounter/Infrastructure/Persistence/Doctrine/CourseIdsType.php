<?php

declare(strict_types=1);

namespace Pokedex\Web\CoursesCounter\Infrastructure\Persistence\Doctrine;

use Doctrine\DBAL\Types\ConversionException;
use Pokedex\Web\Shared\Domain\Courses\CourseId;
use Pokedex\Shared\Infrastructure\Doctrine\Dbal\DoctrineCustomType;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\JsonType;
use function Lambdish\Phunctional\map;

final class CourseIdsType extends JsonType implements DoctrineCustomType
{
    public static function customTypeName(): string
    {
        return 'course_ids';
    }

    public function getName(): string
    {
        return self::customTypeName();
    }

    /**
     * @return mixed
     * @throws ConversionException
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform): mixed
    {
        return parent::convertToDatabaseValue(map(fn(CourseId $id) => $id->value(), $value), $platform);
    }

    /**
     * @return mixed
     * @throws ConversionException
     */
    public function convertToPHPValue($value, AbstractPlatform $platform): mixed
    {
        $scalars = parent::convertToPHPValue($value, $platform);

        return map(fn(string $value) => new CourseId($value), $scalars);
    }
}
