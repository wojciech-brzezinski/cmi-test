<?php

declare(strict_types = 1);

namespace App\Infrastructure\Http\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;

/**
 */
abstract class HttpController extends AbstractController
{
    private MessageBusInterface $commands;
    private MessageBusInterface $queries;

    public function __construct(MessageBusInterface $commands, MessageBusInterface $queries)
    {
        $this->commands = $commands;
        $this->queries = $queries;
    }

    /**
     * @param object $query
     *
     * @return null|mixed
     */
    final protected function ask(object $query)
    {
        /** @var HandledStamp|null $stamp */
        $stamp = $this->queries->dispatch($query)->last(HandledStamp::class);

        return null === $stamp ? null : $stamp->getResult();
    }
}
