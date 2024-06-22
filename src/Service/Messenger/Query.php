<?php

namespace GS\WebApp\Service\Messenger;

use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;
use GS\WebApp\Contract\Messenger\QueryInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use GS\WebApp\Type\Messenger\BusTypes;

class Query
{
    use HandleTrait;

    public function __construct(
		#[Autowire(service: BusTypes::QUERY_BUS)]
        private MessageBusInterface $messageBus,
    ) {
    }

    public function __invoke(QueryInterface $query): mixed
    {
        return $this->handle($query);
    }
}
