<?php

declare(strict_types = 1);

namespace App\Application\Query\Article\Handler;

use App\Application\Query\Article\GetArticleByURI;
use App\Infrastructure\Article\Query\Repository\SQLRepository;
use App\Infrastructure\Article\Query\View\Article;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

/**
 */
final class GetArticleByURIHandler implements MessageHandlerInterface
{
    private SQLRepository $repository;

    public function __construct(SQLRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(GetArticleByURI $query): ?Article
    {
        return $this->repository->findByURI($query->uri());
    }
}
