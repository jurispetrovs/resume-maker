<?php

namespace App\Services\PersonServices;

use App\Repositories\EducationRepository;
use App\Repositories\PersonRepository;
use App\Repositories\WorkplaceRepository;

class ShowSinglePersonResumeService
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
        $resume = [];

        $resume['person'] = $this->personRepository->getPersonById($id);
        $resume['education'] = $this->educationRepository->getAllByPersonId($id);
        $resume['workplaces'] = $this->workplaceRepository->getAllByPersonId($id);

        return $resume;
    }
}
