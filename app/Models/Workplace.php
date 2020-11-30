<?php

namespace App\Models;

class Workplace
{
    private ?string $id;
    private ?string $title;
    private ?string $positionHeld;
    private ?string $workload;
    private ?string $startDate;
    private ?string $endDate;
    private ?Location $location;
    private ?Skill $skill;

    public function __construct(
        ?string $id,
        ?string $title,
        ?string $positionHeld,
        ?string $workload,
        ?string $startDate,
        ?string $endDate,
        ?Location $location,
        ?Skill $skill

    )
    {
        $this->id = $id;
        $this->title = $title;
        $this->positionHeld = $positionHeld;
        $this->workload = $workload;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->location = $location;
        $this->skill = $skill;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPositionHeld(): string
    {
        return $this->positionHeld;
    }

    public function getWorkload(): string
    {
        return $this->workload;
    }

    public function getStartDate(): string
    {
        return $this->startDate;
    }

    public function getEndDate(): string
    {
        return $this->endDate;
    }

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function getSkill(): ?Skill
    {
        return $this->skill;
    }

    public static function create(
        array $data,
        ?Location $location,
        ?Skill $skill
    ): self
    {
        return new self(
            $data['id'],
            $data['title'],
            $data['position_held'],
            $data['workload'],
            $data['start_date'],
            $data['end_date'],
            $location,
            $skill
        );
    }
}