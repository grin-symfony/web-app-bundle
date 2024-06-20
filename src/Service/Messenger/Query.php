<?php

namespace GS\WebApp\Service\Messenger;

use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;
use GS\WebApp\Contract\Messenger\QueryInterface;

class Query
{
    use HandleTrait;

    public function __construct(
        private MessageBusInterface $messageBus,
    ) {
    }

    public function __invoke(QueryInterface $query): mixed
    {
        return $this->handle($query);
    }
}
