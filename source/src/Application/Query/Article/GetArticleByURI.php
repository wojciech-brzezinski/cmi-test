<?php

declare(strict_types = 1);

namespace App\Application\Query\Article;

/**
 *
 */
final class GetArticleByURI
{
    private string $uri;
    
    public function __construct(string $uri)
    {
        $this->uri = $uri;
    }

    public function uri(): string
    {
        return $this->uri;
    }
}
