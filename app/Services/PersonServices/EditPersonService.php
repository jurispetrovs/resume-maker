<?php

namespace App\Services\PersonServices;

use App\Repositories\LocationRepository;
use App\Repositories\PersonRepository;

class EditPersonService
{
    private PersonRepository $personRepository;
    private LocationRepository $locationRepository;

    public function __construct()
    {
        $this->personRepository = new PersonRepository();
        $this->locationRepository = new LocationRepository();
    }

    public function execute(string $id, array $data)
    {
        $this->personRepository->update(
            $data['person'],
            $id,
            $this->locationRepository->getIdByCountryAndCity(
                $data['person']['country'],
                $data['person']['city']
            )
        );

        header('Location: /resume/' . $id);
    }
}