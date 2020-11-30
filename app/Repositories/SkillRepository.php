<?php

namespace App\Repositories;

use App\Models\Skill;
use Ramsey\Uuid\Uuid;

class SkillRepository
{
    public function getByWorkplaceId(string $id): ?Skill
    {
        $data = query()
            ->select('*')
            ->from('skills')
            ->where('workplace_id = :workplace_id')
            ->setParameter('workplace_id', $id)
            ->execute()
            ->fetchAssociative();

        if ($data) {
            return Skill::create($data);
        }

        return null;
    }

    public function insert(array $data, string $workplaceId): void
    {
        if (!isset($data['type'])) $data['type'] = '';

        $id = Uuid::uuid4()->toString();

        query()->insert('skills')
            ->values([
                'id' => ':id',
                'workplace_id' => ':workplaceId',
                'title' => ':title',
                'type' => ':type',
                'achievement' => ':achievement'
            ])
            ->setParameters([
                'id' => $id,
                'workplaceId' => $workplaceId,
                'title' => $data['description'],
                'type' => $data['type'],
                'achievement' => $data['achievement']
            ])
            ->execute();
    }

    public function delete(string $workplaceId): void
    {
        query()
            ->delete('skills')
            ->where('workplace_id = :workplaceId')
            ->setParameter('workplaceId', $workplaceId)
            ->execute();
    }

    public function update(array $data, string $workplaceId): void
    {
        if (!isset($data['type'])) $data['type'] = '';

        query()->update('skills')
            ->set('title', ':title')
            ->set('type', ':type')
            ->set('achievement', ':achievement')
            ->setParameters([
                'title' => $data['description'],
                'type' => $data['type'],
                'achievement' => $data['achievement']
            ])
            ->where('workplace_id = :workplaceId')
            ->setParameter('workplaceId', $workplaceId)
            ->execute();
    }
}