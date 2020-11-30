<?php

namespace App\Services\EducationServices;

use App\Repositories\EducationRepository;

class ShowEducationService
{
    private EducationRepository $educationRepository;

    public function __construct()
    {
        $this->educationRepository = new EducationRepository();
    }

    public function execute(string $id)
    {
        return $this->educationRepository->getById($id);
    }
}