<?php

namespace App\Models;

class Education
{
    private ?string $id;
    private ?string $name;
    private ?string $faculty;
    private ?string $fieldOfStudy;
    private ?string $awardedDegree;
    private ?string $formOfEducation;
    private ?string $startDate;
    private ?string $endDate;
    private ?string $status;
    private ?Location $location;

    public function __construct(
        ?string $id,
        ?string $name,
        ?string $faculty,
        ?string $fieldOfStudy,
        ?string $awardedDegree,
        ?string $formOfEducation,
        ?string $startDate,
        ?string $endDate,
        ?string $status,
        ?Location $location
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->faculty = $faculty;
        $this->fieldOfStudy = $fieldOfStudy;
        $this->awardedDegree = $awardedDegree;
        $this->formOfEducation = $formOfEducation;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->status = $status;
        $this->location = $location;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getFaculty(): string
    {
        return $this->faculty;
    }

    public function getFieldOfStudy(): string
    {
        return $this->fieldOfStudy;
    }

    public function getAwardedDegree(): string
    {
        return $this->awardedDegree;
    }

    public function getFormOfEducation(): string
    {
        return $this->formOfEducation;
    }

    public function getStartDate(): string
    {
        return $this->startDate;
    }

    public function getEndDate(): string
    {
        return $this->endDate;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public static function create(array $data, ?Location $location): self
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['faculty'],
            $data['field_of_study'],
            $data['awarded_degree'],
            $data['form_of_education'],
            $data['start_date'],
            $data['end_date'],
            $data['status'],
            $location
        );
    }
}