<?php

declare(strict_types = 1);

namespace App\Application\Query\Comment\Handler;

use App\Application\Query\Comment\GetLastComments;
use App\Infrastructure\Comment\Query\Repository\SQLRepository;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

/**
 */
final class GetLastCommentsHandler implements MessageHandlerInterface
{
    private SQLRepository $repository;

    public function __construct(SQLRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(GetLastComments $query): array
    {
        return $this->repository->findMostRecent();
    }
}
