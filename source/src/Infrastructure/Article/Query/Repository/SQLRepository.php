<?php

declare(strict_types = 1);

namespace App\Infrastructure\Article\Query\Repository;

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
    
    public function findByURI(string $uri): ?Article
    {
        $builder = $this->connection->createQueryBuilder();
        $builder
            ->select([
                "t0.`uuid`",
                "t0.`text_value`",
                "t0.`title_value`",
                "t0.`uri`",
            ])
            ->from("articles", "t0")
            ->where("t0.`uri` = :uri")
                ->setParameter("uri", $uri);
        
        $result = $builder->execute()->fetchAssociative();

        return false === $result ? null : new Article(
            $result["uuid"],
            $result["uri"],
            $result["title_value"],
            $result["text_value"],
        );
    }
}
