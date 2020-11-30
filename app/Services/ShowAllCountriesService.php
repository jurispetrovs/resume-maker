<?php

namespace App\Services;

use App\Repositories\CountryRepository;

class ShowAllCountriesService
{
    private CountryRepository $countryRepository;

    public function __construct()
    {
        $this->countryRepository = new CountryRepository();
    }

    public function execute(): array
    {
        return $this->countryRepository->getAll();
    }
}
