<?php

namespace App\Services\PersonServices;

use App\Repositories\EducationRepository;
use App\Repositories\PersonRepository;
use App\Repositories\WorkplaceRepository;

class ShowPersonService
{
    private PersonRepository $personRepository;
    private EducationRepository $educationRepository;
    private WorkplaceRepository $workplaceRepository;

    public function __construct()
    {
        $this->personRepository = new PersonRepository();
        $this->educationRepository = new EducationRepository();
        $this->workplaceRepository = new WorkplaceRepository();
    }

    public function execute(string $id)
    {
        return $this->personRepository->getPersonById($id);
    }
}
