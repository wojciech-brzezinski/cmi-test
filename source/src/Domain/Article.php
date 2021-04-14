<?php

declare(strict_types = 1);

namespace App\Domain;

use App\Domain\Shared\ValueObject\Text;
use League\Uri\Contracts\UriInterface;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * 
 */
final class Article
{
    private Text $text;
    private Text $title;
    private UuidInterface $uuid;
    private UriInterface $uri;

    public function __construct(UriInterface $uri, Text $title, Text $text)
    {
        list(
            $this->uri,
            $this->title,
            $this->text,
        ) = func_get_args();
        $this->uuid = Uuid::uuid4();
    }

    public function uuid(): UuidInterface
    {
        return $this->uuid;
    }
}
