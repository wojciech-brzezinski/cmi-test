<?php

declare(strict_types = 1);

namespace App\Infrastructure\Article\Query\View;

/**
 */
final class Article
{
    private string $id;
    private string $text;
    private string $title;
    private string $uri;

    public function __construct(string $id, string $uri, string $title, string $text)
    {
        list(
            $this->id,
            $this->uri,
            $this->title,
            $this->text,
        ) = func_get_args();
    }

    public function id(): string
    {
        return $this->id;
    }
    
    public function text(): string
    {
        return $this->text;
    }
    
    public function title(): string
    {
        return $this->title;
    }

    public function uri(): string
    {
        return $this->uri;
    }
}
