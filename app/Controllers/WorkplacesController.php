<?php

namespace App\Controllers;

use App\Services\ShowAllCountriesService;
use App\Services\SkillServices\DeleteSkillService;
use App\Services\WorkplaceServices\DeleteWorkplaceService;
use App\Services\WorkplaceServices\EditWorkplaceService;
use App\Services\WorkplaceServices\ImportWorkplaceService;
use App\Services\WorkplaceServices\ShowWorkplaceService;

class WorkplacesController
{
    public function create(array $vars)
    {
        $id = (string)$vars['id'];

        $countries = (new ShowAllCountriesService())->execute();

        return require_once __DIR__ . '/../Views/CreateWorkplaceView.php';
    }

    public function insert(array $vars)
    {
        $id = (string)$vars['id'];

        $workplace = $_POST['workplaces'];
        $skill = $_POST['skills'];

        (new ImportWorkplaceService())->execute($id, $workplace, $skill);

        header('Location: /resume/' . $id);
    }

    public function edit(array $vars)
    {
        $id = (string)$vars['id'];
        $workplaceId = (string)$vars['workplace-id'];

        $countries = (new ShowAllCountriesService())->execute();
        $workplace = (new ShowWorkplaceService())->execute($workplaceId);

        return require_once __DIR__ . '/../Views/WorkplaceEditView.php';
    }

    public function update(array $vars)
    {
        $id = (string)$vars['id'];
        $workplaceId = (string)$vars['workplace-id'];

        $workplace = $_POST['workplaces'];
        $skill = $_POST['skills'];

        (new EditWorkplaceService())->execute($workplaceId, $workplace, $skill);

        header('Location: /resume/' . $id);
    }

    public function delete(array $vars)
    {
        $id = (string)$vars['id'];
        $workplaceId = (string)$vars['workplace-id'];

        (new DeleteWorkplaceService())->execute($workplaceId);
        (new DeleteSkillService())->execute($workplaceId);

        header('Location: /resume/' . $id);
    }
}