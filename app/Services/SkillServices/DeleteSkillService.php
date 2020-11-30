<?php

namespace App\Services\SkillServices;

use App\Repositories\SkillRepository;

class DeleteSkillService
{
    private SkillRepository $skillRepository;

    public function __construct()
    {
        $this->skillRepository = new SkillRepository();
    }

    public function execute(string $workplaceId)
    {
        $this->skillRepository->delete($workplaceId);
    }
}