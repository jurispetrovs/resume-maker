<?php

namespace App\Controllers;

use App\Services\PersonServices\EditPersonService;
use App\Services\PersonServices\ShowPersonService;
use App\Services\ShowAllCountriesService;

class PersonsController
{
    public function edit(array $vars)
    {
        $id = (string)$vars['id'];

        $countries = (new ShowAllCountriesService())->execute();
        $person = (new ShowPersonService())->execute($id);

        return require_once __DIR__ . '/../Views/PersonEditView.php';
    }

    public function update(array $vars)
    {
        $id = (string)$vars['id'];

        $data = $_POST;

        (new EditPersonService())->execute($id, $data);
    }
}