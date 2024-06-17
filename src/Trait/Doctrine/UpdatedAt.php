<?php

namespace GS\WebApp\Trait\Doctrine;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use GS\Service\Service\CarbonService;

trait UpdatedAt {
	
	#[ORM\Column(nullable: true)]
    protected ?\DateTimeImmutable $updatedAt = null;
	
    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(): void
    {
        $this->updatedAt = CarbonService::getNow();
    }
}