<?php

declare(strict_types=1);

namespace Pokedex\Shared\Infrastructure\Persistence\Doctrine;

use JetBrains\PhpStorm\Pure;
use Pokedex\Shared\Domain\Utils;
use Pokedex\Shared\Domain\ValueObject\Uuid;
use Pokedex\Shared\Infrastructure\Doctrine\Dbal\DoctrineCustomType;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;
use function Lambdish\Phunctional\last;

abstract class UuidType extends StringType implements DoctrineCustomType
{
    abstract protected function typeClassName(): string;

    public static function customTypeName(): string
    {
        return Utils::toSnakeCase(str_replace('Type', '', (string) last(explode('\\', static::class))));
    }

    public function getName(): string
    {
        return self::customTypeName();
    }

    /**
     * @param mixed $value
     * @param AbstractPlatform $platform
     * @return mixed
     */
    public function convertToPHPValue($value, AbstractPlatform $platform): mixed
    {
        $className = $this->typeClassName();

        return new $className($value);
    }

    /**
     * @param $value
     * @param AbstractPlatform $platform
     * @return mixed
     */
    #[Pure] public function convertToDatabaseValue($value, AbstractPlatform $platform): mixed
    {
        /** @var Uuid $value */
        return $value->value();
    }
}
