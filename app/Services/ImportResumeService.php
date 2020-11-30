<?php

namespace App\Services;

use App\Repositories\EducationRepository;
use App\Repositories\LocationRepository;
use App\Repositories\PersonRepository;
use App\Repositories\SkillRepository;
use App\Repositories\WorkplaceRepository;
use Ramsey\Uuid\Uuid;

class ImportResumeService
{
    private PersonRepository $personRepository;
    private EducationRepository $educationRepository;
    private WorkplaceRepository $workplaceRepository;
    private SkillRepository $skillRepository;
    private LocationRepository $locationRepository;

    public function __construct()
    {
        $this->personRepository = new PersonRepository();
        $this->educationRepository = new EducationRepository();
        $this->workplaceRepository = new WorkplaceRepository();
        $this->skillRepository = new SkillRepository();
        $this->locationRepository = new LocationRepository();
    }

    public function execute(array $data): string
    {
        $personId = Uuid::uuid4()->toString();

        $this->personRepository->insert(
            $data['person'],
            $personId,
            $this->locationRepository->getIdByCountryAndCity(
                $data['person']['country'],
                $data['person']['city']
            )
        );

        foreach ($data['education'] as $education) {
            if($education['name']) {

                if (!isset($education['country'])) $education['country'] = '';

                if($education['country'] || $education['city']) {
                    $locationId = $this->locationRepository->getIdByCountryAndCity(
                        $education['country'],
                        $education['city']
                    );
                } else {
                    $locationId = '';
                }

                $this->educationRepository->insert(
                    $education,
                    $personId,
                    $locationId
                );
            }
        }

        foreach ($data['workplaces'] as $key => $workplace) {
            if($workplace['employer']) {

                if (!isset($workplace['country'])) $workplace['country'] = '';

                if($workplace['country'] || $workplace['city']) {
                    $locationId = $this->locationRepository->getIdByCountryAndCity(
                        $workplace['country'],
                        $workplace['city']
                    );
                } else {
                    $locationId = '';
                }

                $workplaceId = Uuid::uuid4()->toString();

                $this->workplaceRepository->insert(
                    $workplace,
                    $workplaceId,
                    $personId,
                    $locationId
                );

                if($data['skills'][$key]['description']) {
                    $this->skillRepository->insert(
                        $data['skills'][$key],
                        $workplaceId
                    );
                }
            }
        }

        return $personId;
    }
}
