<?php

namespace App\Services\EducationServices;

use App\Repositories\EducationRepository;

class DeleteEducationService
{
    private EducationRepository $educationRepository;

    public function __construct()
    {
        $this->educationRepository = new EducationRepository();
    }

    public function execute(string $id)
    {
        $this->educationRepository->delete($id);
    }
}
