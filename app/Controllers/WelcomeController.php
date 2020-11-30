<?php

namespace App\Controllers;

use App\Services\PersonServices\ShowAllPersonsService;

class WelcomeController
{
    public function index()
    {
        $persons = (new ShowAllPersonsService())->execute();

        return require_once __DIR__ . '/../Views/WelcomePageView.php';
    }
}