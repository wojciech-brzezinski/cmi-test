<?php

declare(strict_types = 1);

namespace App\Domain\Shared\ValueObject;

use Assert\Assertion;
use Assert\AssertionFailedException;

/**
 * 
 */
final class Text
{
    private string $value;

    /**
     * @throws AssertionFailedException
     */
    public function __construct(string $value)
    {
        Assertion::minLength($this->value = $value, 1);
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
