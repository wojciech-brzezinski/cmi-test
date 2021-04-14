<?php

declare(strict_types = 1);

namespace App\Infrastructure\Doctrine\ORM\Type;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 *
 */
final class UuidType extends Type
{
    private const NAME = "uuid";
    private const SQL_DECLARATION = "VARCHAR(36)";

    /**
     * {@inheritDoc}
     *
     * @param UuidInterface $value
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform): string
    {
        return $value->toString();
    }

    /**
     * {@inheritDoc}
     *
     * @param string $value
     */
    public function convertToPHPValue($value, AbstractPlatform $platform): UuidInterface
    {
        return Uuid::fromString($value);
    }

    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return self::SQL_DECLARATION;
    }

    public function getName(): string
    {
        return self::NAME;
    }
}
