<?php

namespace App\Services\WorkplaceServices;

use App\Repositories\LocationRepository;
use App\Repositories\SkillRepository;
use App\Repositories\WorkplaceRepository;
use Ramsey\Uuid\Uuid;

class ImportWorkplaceService
{
    private WorkplaceRepository $workplaceRepository;
    private SkillRepository $skillRepository;
    private LocationRepository $locationRepository;

    public function __construct()
    {
        $this->workplaceRepository = new WorkplaceRepository();
        $this->skillRepository = new SkillRepository();
        $this->locationRepository = new LocationRepository();
    }

    public function execute(string $id, array $workplace, array $skill)
    {
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
                $id,
                $locationId
            );

            if($skill['description']) {
                $this->skillRepository->insert(
                    $skill,
                    $workplaceId
                );
            }
        }
    }
}