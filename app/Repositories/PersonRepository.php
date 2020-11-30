<?php

namespace App\Repositories;

use App\Models\Person;

class PersonRepository
{
    public function getAllPersons(): array
    {
        $data = query()
            ->select('*')
            ->from('persons')
            ->orderBy('created_at', 'DESC')
            ->execute()
            ->fetchAllAssociative();

        $persons = [];

        foreach ($data as $person) {
            $location = (new LocationRepository())->getLocation($person['location_id']);
            $persons[] = Person::create($person, $location);
        }

        return $persons;
    }

    public function getPersonById(string $id): Person
    {
        $data = query()
            ->select('*')
            ->from('persons')
            ->where('id = :id')
            ->setParameter('id', $id)
            ->execute()
            ->fetchAssociative();

        $location = (new LocationRepository())->getLocation($data['location_id']);

        return Person::create($data, $location);
    }

    public function insert(array $data, string $id, string $locationId): void
    {
        if (!isset($data['gender'])) $data['gender'] = '';

        query()->insert('persons')
            ->values([
                'id' => ':id',
                'name' => ':name',
                'surname' => ':surname',
                'gender' => ':gender',
                'phone' => ':phone',
                'email' => ':email',
                'location_id' => ':locationId'
            ])
            ->setParameters([
                'id' => $id,
                'name' => $data['name'],
                'surname' => $data['surname'],
                'gender' => $data['gender'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'locationId' => $locationId
            ])
            ->execute();
    }

    public function delete(string $id): void
    {
        query()
            ->delete('persons')
            ->where('id = :id')
            ->setParameter('id', $id)
            ->execute();
    }

    public function update(array $data, string $id, string $locationId): void
    {
        if (!isset($data['gender'])) $data['gender'] = '';

        query()->update('persons')
            ->set('name', ':name')
            ->set('surname', ':surname')
            ->set('gender', ':gender')
            ->set('phone', ':phone')
            ->set('email', ':email')
            ->set('location_id', ':locationId')
            ->setParameters([
                'name' => $data['name'],
                'surname' => $data['surname'],
                'gender' => $data['gender'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'locationId' => $locationId
            ])
            ->where('id = :id')
            ->setParameter('id', $id)
            ->execute();
    }
}