<?php

namespace App\Services\WorkplaceServices;

use App\Repositories\WorkplaceRepository;

class ShowWorkplaceService
{
    private WorkplaceRepository $workplaceRepository;

    public function __construct()
    {
        $this->workplaceRepository = new WorkplaceRepository();
    }

    public function execute(string $id)
    {
        return $this->workplaceRepository->getById($id);
    }
}