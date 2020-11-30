<?php

namespace App\Controllers;

use App\Services\DeleteResumeService;
use App\Services\ImportResumeService;
use App\Services\PersonServices\ShowAllPersonsService;
use App\Services\PersonServices\ShowSinglePersonResumeService;
use App\Services\ShowAllCountriesService;

class ResumesController
{
    public function index(array $vars)
    {
        $id = (string)$vars['id'];

        $persons = (new ShowAllPersonsService())->execute();
        $resume = (new ShowSinglePersonResumeService())->execute($id);

        return require_once __DIR__ . '/../Views/SingleResumeView.php';
    }

    public function show()
    {
        $persons = (new ShowAllPersonsService())->execute();
        $countries = (new ShowAllCountriesService())->execute();

        return require_once __DIR__ . '/../Views/ResumeCreateView.php';
    }

    public function create(): void
    {
        $data = $_POST;

        $id = (new ImportResumeService())->execute($data);

        header('Location: /resume/' . $id);
    }

    public function delete(array $vars): void
    {
        $personId = $vars['id'];

        (new DeleteResumeService())->execute($personId);

        header('Location: /');
    }
}