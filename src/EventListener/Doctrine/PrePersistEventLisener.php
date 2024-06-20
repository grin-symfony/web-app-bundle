<?php

namespace GS\WebApp\EventListener\Doctrine;

use Doctrine\ORM\Event\PrePersistEventArgs;

class PrePersistEventLisener
{
    public function __construct()
    {
    }

    public function __invoke(
        PrePersistEventArgs $args,
    ): void {
        $ojb = $args->getObject();

        if (\method_exists($ojb, 'setCreatedAt')) {
            $ojb->setCreatedAt();
        }
    }
}
