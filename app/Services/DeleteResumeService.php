<?php

namespace App\Services;

use App\Repositories\EducationRepository;
use App\Repositories\PersonRepository;
use App\Repositories\SkillRepository;
use App\Repositories\WorkplaceRepository;

class DeleteResumeService
{
    private PersonRepository $personRepository;
    private EducationRepository $educationRepository;
    private WorkplaceRepository $workplaceRepository;
    private SkillRepository $skillRepository;

    public function __construct()
    {
        $this->personRepository = new PersonRepository();
        $this->educationRepository = new EducationRepository();
        $this->workplaceRepository = new WorkplaceRepository();
        $this->skillRepository = new SkillRepository();
    }

    public function execute(string $personId): void
    {
        $this->personRepository->delete($personId);
        $this->educationRepository->deleteByPersonId($personId);
        $workplaces = $this->workplaceRepository->getAllByPersonId($personId);

        foreach ($workplaces as $workplace)
        {
            $this->workplaceRepository->delete($workplace->getId());
            $this->skillRepository->delete($workplace->getId());
        }
    }
}