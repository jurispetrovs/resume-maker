<?php

namespace App\Models;

class Person
{
    private string $id;
    private string $name;
    private ?string $surname;
    private ?string $gender;
    private ?string $phone;
    private string $email;
    private Location $location;

    public function __construct(
        string $id,
        string $name,
        ?string $surname,
        ?string $gender,
        ?string $phone,
        string $email,
        Location $location
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->gender = $gender;
        $this->phone = $phone;
        $this->email = $email;
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

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getLocation(): Location
    {
        return $this->location;
    }

    public static function create(array $data, Location $location): self
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['surname'],
            $data['gender'],
            $data['phone'],
            $data['email'],
            $location
        );
    }
}