<?php

declare(strict_types = 1);

namespace App\Domain;

use App\Domain\Shared\ValueObject\Text;
use DateTime;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 *
 */
final class Comment
{
    private DateTime $createdAt;
    private UuidInterface $owner;
    private Text $text;
    private UuidInterface $uuid;

    public function __construct(UuidInterface $owner, Text $text)
    {
        $this->createdAt = new DateTime();
        $this->uuid = Uuid::uuid4();

        list(
            $this->owner,
            $this->text,
        ) = func_get_args();
    }
}
