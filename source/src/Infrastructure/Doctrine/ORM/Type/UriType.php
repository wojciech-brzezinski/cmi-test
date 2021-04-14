<?php

declare(strict_types = 1);

namespace App\Infrastructure\Doctrine\ORM\Type;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use League\Uri\Contracts\UriInterface;
use League\Uri\Uri;

/**
 *
 */
final class UriType extends Type
{
    private const NAME = "uri";
    private const SQL_DECLARATION = "VARCHAR(255)";

    /**
     * {@inheritDoc}
     *
     * @param UriInterface $value
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform): string
    {
        return (string)$value;
    }

    /**
     * {@inheritDoc}
     *
     * @param string $value
     */
    public function convertToPHPValue($value, AbstractPlatform $platform): UriInterface
    {
        return Uri::createFromString($value);
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
