<?php

namespace App\Services\WorkplaceServices;

use App\Repositories\LocationRepository;
use App\Repositories\SkillRepository;
use App\Repositories\WorkplaceRepository;

class EditWorkplaceService
{
    private WorkplaceRepository $workplaceRepository;
    private LocationRepository $locationRepository;
    private SkillRepository $skillRepository;

    public function __construct()
    {
        $this->workplaceRepository = new WorkplaceRepository();
        $this->locationRepository = new LocationRepository();
        $this->skillRepository = new SkillRepository();
    }

    public function execute(string $id, array $workplace, array $skill)
    {
        if (!isset($workplace['country'])) $data['country'] = '';

        if($workplace['country'] || $workplace['city']) {
            $locationId = $this->locationRepository->getIdByCountryAndCity(
                $workplace['country'],
                $workplace['city']
            );
        } else {
            $locationId = '';
        }

        $this->workplaceRepository->update(
            $workplace,
            $id,
            $locationId
        );

        if($skill) {
            $this->skillRepository->update(
                $skill,
                $id
            );
        }
    }
}