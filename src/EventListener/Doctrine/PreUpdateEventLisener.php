<?php

namespace GS\WebApp\EventListener\Doctrine;

use Doctrine\ORM\Event\PreUpdateEventArgs;

class PreUpdateEventLisener
{
    public function __construct()
    {
    }

    public function __invoke(
        PreUpdateEventArgs $args,
    ): void {
        $ojb = $args->getObject();

        if (\method_exists($ojb, 'setUpdatedAt')) {
            $ojb->setUpdatedAt();
        }
    }
}
