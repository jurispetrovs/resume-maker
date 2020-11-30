<?php

namespace App\Models;

class Skill
{
    private ?string $title;
    private ?string $type;
    private ?string $achievement;

    public function __construct(
        ?string $title,
        ?string $type,
        ?string $achievement
    )
    {
        $this->title = $title;
        $this->type = $type;
        $this->achievement = $achievement;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getAchievement(): string
    {
        return $this->achievement;
    }

    public static function create(array $data): self
    {
        return new self(
            $data['title'],
            $data['type'],
            $data['achievement']
        );
    }
}