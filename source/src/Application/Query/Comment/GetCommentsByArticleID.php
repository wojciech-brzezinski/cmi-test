<?php

declare(strict_types = 1);

namespace App\Application\Query\Comment;

/**
 */
final class GetCommentsByArticleID
{
    private string $articleID;

    public function __construct(string $articleID)
    {
        $this->articleID = $articleID;
    }

    public function articleID(): string
    {
        return $this->articleID;
    }
}
