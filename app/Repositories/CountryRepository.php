<?php

namespace App\Repositories;

use PragmaRX\Countries\Package\Countries;

class CountryRepository
{
    public function getAll(): array
    {
        $world = new Countries();

        $countries = $world->all()->pluck('name.common')->toArray();
        sort($countries);

        return $countries;
    }
}