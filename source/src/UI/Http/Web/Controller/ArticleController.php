<?php

declare(strict_types = 1);

namespace App\UI\Http\Web\Controller;

use App\Application\Query\Article\GetArticleByURI;
use App\Infrastructure\Http\Controller\HttpController;
use Symfony\Component\HttpFoundation\Response;

/**
 *
 */
final class ArticleController extends HttpController
{
    public function __invoke(string $uri): Response
    {
        $article = $this->ask(
            new GetArticleByURI("/".$uri)
        );

//        $comments = $this->ask(
//            new GetCommentsByArticle($article)
//        );

        return $this->render("view/article.html.twig", [
            "article" => $article,
        ]);
    }
}
