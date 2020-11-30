<?php

namespace App\Controllers;

use App\Services\EducationServices\DeleteEducationService;
use App\Services\EducationServices\EditEducationService;
use App\Services\EducationServices\ImportEducationService;
use App\Services\EducationServices\ShowEducationService;
use App\Services\ShowAllCountriesService;

class EducationsController
{
    public function create(array $vars)
    {
        $id = (string)$vars['id'];

        $countries = (new ShowAllCountriesService())->execute();

        return require_once __DIR__ . '/../Views/CreateEducationView.php';
    }

    public function insert(array $vars)
    {
        $id = (string)$vars['id'];

        $data = $_POST['education'];

        (new ImportEducationService())->execute($id, $data);

        header('Location: /resume/' . $id);
    }

    public function edit(array $vars)
    {
        $id = (string)$vars['id'];
        $educationId = (string)$vars['education-id'];

        $countries = (new ShowAllCountriesService())->execute();
        $education = (new ShowEducationService())->execute($educationId);

        return require_once __DIR__ . '/../Views/EducationEditView.php';
    }

    public function update(array $vars)
    {
        $id = (string)$vars['id'];
        $educationId = (string)$vars['education-id'];

        $data = $_POST['education'];

        (new EditEducationService())->execute($educationId, $data);

        header('Location: /resume/' . $id);
    }

    public function delete(array $vars)
    {
        $id = (string)$vars['id'];
        $educationId = (string)$vars['education-id'];

        (new DeleteEducationService())->execute($educationId);

        header('Location: /resume/' . $id);
    }
}