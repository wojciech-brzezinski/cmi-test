<?php

declare(strict_types = 1);

namespace App\Infrastructure\Comment\Query\Repository;

use App\Infrastructure\Article\Query\View\Article;
use Doctrine\DBAL\Connection;

/**
 * 
 */
final class SQLRepository
{
    private Connection $connection;
    
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function findByArticleID(string $articleID): array
    {
        $builder = $this->connection->createQueryBuilder();
        $builder
            ->select([
                "t0.`uuid`",
                "t0.`text_value`",
                "t0.`owner_id`",
                "t0.`created_at`",
            ])
            ->from("comments", "t0")
            ->where("t0.`owner_id` = :ownerID")
                ->setParameter("ownerID", $articleID)
            ->orderBy("created_at", "DESC");
        
        return $builder->execute()->fetchAllAssociative();
    }

    public function findMostRecent(): array
    {
        $builder = $this->connection->createQueryBuilder();
        $builder
            ->select([
                "t0.`uuid`",
                "t0.`text_value`",
                "t0.`owner_id`",
                "t0.`created_at`",
            ])
            ->from("comments", "t0")
            ->orderBy("created_at", "DESC")
            ->setMaxResults(5);

        return $builder->execute()->fetchAllAssociative();
    }
}
