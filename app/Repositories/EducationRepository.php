<?php

namespace App\Repositories;

use App\Models\Education;
use Ramsey\Uuid\Uuid;

class EducationRepository
{
    public function getAllByPersonId(string $id): array
    {
        $data = query()
            ->select('*')
            ->from('educational_institutions')
            ->where('person_id = :person_id')
            ->setParameter('person_id', $id)
            ->orderBy('start_date', 'DESC')
            ->execute()
            ->fetchAllAssociative();

        $educationalInstitutions = [];

        foreach ($data as $educationalInstitution) {
            $location = (new LocationRepository)->getLocation($educationalInstitution['location_id']);
            $educationalInstitutions[] = Education::create($educationalInstitution, $location);
        }

        return $educationalInstitutions;
    }

    public function getById(string $id)
    {
        $data = query()
            ->select('*')
            ->from('educational_institutions')
            ->where('id = :id')
            ->setParameter('id', $id)
            ->execute()
            ->fetchAssociative();

        $location = (new LocationRepository())->getLocation($data['location_id']);

        return Education::create($data, $location);
    }

    public function insert(array $data, string $personId, string $locationId): void
    {
        if (!isset($data['awarded-degree'])) $data['awarded-degree'] = '';
        if (!isset($data['form-of-education'])) $data['form-of-education'] = '';
        if (!isset($data['status'])) $data['status'] = '';

        $id = Uuid::uuid4()->toString();

        query()->insert('educational_institutions')
            ->values([
                'id' => ':id',
                'person_id' => ':personId',
                'name' => ':name',
                'location_id' => ':locationId',
                'faculty' => ':faculty',
                'field_of_study' => ':fieldOfStudy',
                'awarded_degree' => ':awardedDegree',
                'form_of_education' => ':formOfEducation',
                'start_date' => ':startDate',
                'end_date' => ':endDate',
                'status' => ':status'
            ])
            ->setParameters([
                'id' => $id,
                'personId' => $personId,
                'name' => $data['name'],
                'locationId' => $locationId,
                'faculty' => $data['faculty'],
                'fieldOfStudy' => $data['field-of-study'],
                'awardedDegree' => $data['awarded-degree'],
                'formOfEducation' => $data['form-of-education'],
                'startDate' => $data['start-date'],
                'endDate' => $data['end-date'],
                'status' => $data['status']
            ])
            ->execute();
    }

    public function deleteByPersonId(string $personId): void
    {
        query()
            ->delete('educational_institutions')
            ->where('person_id = :personId')
            ->setParameter('personId', $personId)
            ->execute();
    }

    public function delete(string $id): void
    {
        query()
            ->delete('educational_institutions')
            ->where('id = :id')
            ->setParameter('id', $id)
            ->execute();
    }

    public function update(array $data, string $id, string $locationId): void
    {
        if (!isset($data['awarded-degree'])) $data['awarded-degree'] = '';
        if (!isset($data['form-of-education'])) $data['form-of-education'] = '';
        if (!isset($data['status'])) $data['status'] = '';

        query()->update('educational_institutions')
            ->set('name', ':name')
            ->set('faculty', ':faculty')
            ->set('field_of_study', ':fieldOfStudy')
            ->set('awarded_degree', ':awardedDegree')
            ->set('form_of_education', ':formOfEducation')
            ->set('start_date', ':startDate')
            ->set('end_date', ':endDate')
            ->set('status', ':status')
            ->set('location_id', ':locationId')
            ->setParameters([
                'name' => $data['name'],
                'faculty' => $data['faculty'],
                'fieldOfStudy' => $data['field-of-study'],
                'awardedDegree' => $data['awarded-degree'],
                'formOfEducation' => $data['form-of-education'],
                'startDate' => $data['start-date'],
                'endDate' => $data['end-date'],
                'status' => $data['status'],
                'locationId' => $locationId
            ])
            ->where('id = :id')
            ->setParameter('id', $id)
            ->execute();
    }
}