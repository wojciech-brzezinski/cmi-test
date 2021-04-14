<?php

declare(strict_types = 1);

namespace App\UI\Http\Web\Controller;

use App\Infrastructure\Http\Controller\HttpController;
use Symfony\Component\HttpFoundation\Response;

/**
 * 
 */
final class HomeController extends HttpController
{
    public function __invoke(): Response
    {
        return $this->render("view/home.html.twig");
    }
}
