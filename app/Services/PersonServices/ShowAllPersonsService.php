<?php

namespace App\Services\PersonServices;

use App\Repositories\PersonRepository;

class ShowAllPersonsService
{
    private PersonRepository $personRepository;

    public function __construct()
    {
        $this->personRepository = new PersonRepository();
    }

    public function execute(): array
    {
        return $this->personRepository->getAllPersons();
    }
}