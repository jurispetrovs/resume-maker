<?php

namespace App\Services\EducationServices;

use App\Repositories\EducationRepository;
use App\Repositories\LocationRepository;

class ImportEducationService
{
    private EducationRepository $educationRepository;
    private LocationRepository $locationRepository;

    public function __construct()
    {
        $this->educationRepository = new EducationRepository();
        $this->locationRepository = new LocationRepository();
    }

    public function execute(string $id, array $data)
    {
        if($data['name']) {

            if (!isset($data['country'])) $data['country'] = '';

            if($data['country'] || $data['city']) {
                $locationId = $this->locationRepository->getIdByCountryAndCity(
                    $data['country'],
                    $data['city']
                );
            } else {
                $locationId = '';
            }

            $this->educationRepository->insert(
                $data,
                $id,
                $locationId
            );
        }
    }
}