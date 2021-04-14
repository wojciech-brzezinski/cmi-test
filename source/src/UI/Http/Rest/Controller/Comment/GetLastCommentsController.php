<?php

declare(strict_types = 1);

namespace App\UI\Http\Rest\Controller\Comment;

use App\Application\Query\Comment\GetLastComments;
use App\Infrastructure\Http\Controller\HttpController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 */
final class GetLastCommentsController extends HttpController
{
    public function __invoke(Request $request): Response
    {
        $query = $this->prepareQuery($request);

        $comments = $this->ask($query);

        return new JsonResponse($comments);
    }

    private function prepareQuery(Request $request): GetLastComments
    {
        return new GetLastComments();
    }
}
