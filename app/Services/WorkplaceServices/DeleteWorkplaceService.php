<?php

namespace App\Services\WorkplaceServices;

use App\Repositories\WorkplaceRepository;

class DeleteWorkplaceService
{
    private WorkplaceRepository $workplaceRepository;

    public function __construct()
    {
        $this->workplaceRepository = new WorkplaceRepository();
    }

    public function execute(string $id)
    {
        $this->workplaceRepository->delete($id);
    }
}