<?php

namespace App\Repositories;

use App\Models\Workplace;

class WorkplaceRepository
{
    public function getAllByPersonId(string $id): array
    {
        $data = query()
            ->select('*')
            ->from('workplaces')
            ->where('person_id = :person_id')
            ->setParameter('person_id', $id)
            ->orderBy('start_date', 'DESC')
            ->execute()
            ->fetchAllAssociative();

        $workplaces = [];

        foreach ($data as $workplace) {
            $location = (new LocationRepository())->getLocation($workplace['location_id']);
            $skill = (new SkillRepository())->getByWorkplaceId($workplace['id']);

            $workplaces[] = Workplace::create($workplace, $location, $skill);
        }

        return $workplaces;
    }

    public function getById(string $id)
    {
        $data = query()
            ->select('*')
            ->from('workplaces')
            ->where('id = :id')
            ->setParameter('id', $id)
            ->execute()
            ->fetchAssociative();

        $location = (new LocationRepository())->getLocation($data['location_id']);
        $skill = (new SkillRepository())->getByWorkplaceId($data['id']);

        return Workplace::create($data, $location, $skill);
    }

    public function insert(
        array $data,
        string $id,
        string $personId,
        string $locationId
    ): void
    {
        query()->insert('workplaces')
            ->values([
                'id' => ':id',
                'person_id' => ':personId',
                'title' => ':title',
                'location_id' => ':locationId',
                'position_held' => ':positionHeld',
                'workload' => ':workload',
                'start_date' => ':startDate',
                'end_date' => ':endDate'
            ])
            ->setParameters([
                'id' => $id,
                'personId' => $personId,
                'title' => $data['employer'],
                'locationId' => $locationId,
                'positionHeld' => $data['position-held'],
                'workload' => $data['workload'],
                'startDate' => $data['start-date'],
                'endDate' => $data['end-date']
            ])
            ->execute();
    }

    public function delete(string $id): void
    {
        query()
            ->delete('workplaces')
            ->where('id = :id')
            ->setParameter('id', $id)
            ->execute();
    }

    public function update(array $data, string $id, string $locationId): void
    {
        query()->update('workplaces')
            ->set('title', ':title')
            ->set('location_id', ':locationId')
            ->set('position_held', ':positionHeld')
            ->set('workload', ':workload')
            ->set('start_date', ':startDate')
            ->set('end_date', ':endDate')
            ->setParameters([
                'title' => $data['employer'],
                'locationId' => $locationId,
                'positionHeld' => $data['position-held'],
                'workload' => $data['workload'],
                'startDate' => $data['start-date'],
                'endDate' => $data['end-date']
            ])
            ->where('id = :id')
            ->setParameter('id', $id)
            ->execute();
    }
}