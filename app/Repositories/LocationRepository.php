<?php

namespace App\Repositories;

use App\Models\Location;
use Ramsey\Uuid\Uuid;

class LocationRepository
{
    public function getLocation(?string $id): ?Location
    {
        $data = query()
            ->select('*')
            ->from('locations')
            ->where('id = :location_id')
            ->setParameter('location_id', $id)
            ->execute()
            ->fetchAssociative();

        if ($data) {
            return Location::create($data);
        }

        return null;
    }

    public function getIdByCountryAndCity(?string $country, ?string $city): string
    {
        $data = query()
            ->select('id')
            ->from('locations')
            ->where('country = :country')
            ->andWhere('city = :city')
            ->setParameters([
                'country' => $country,
                'city' => $city
            ])
            ->execute()
            ->fetchAssociative();


        if ($data) {
            return $data['id'];
        }

        return $this->insert($country, $city);
    }

    public function insert(?string $country, ?string $city)
    {
        $id = Uuid::uuid4()->toString();

        query()->insert('locations')
            ->values([
                'id' => ':id',
                'country' => ':country',
                'city' => ':city'
            ])
            ->setParameters([
                'id' => $id,
                'country' => $country,
                'city' => $city
            ])
            ->execute();

        return $id;
    }
}