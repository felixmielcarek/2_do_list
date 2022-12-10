<?php

abstract class CanDisplay
{
    protected function displayHome(string $state)
    {
        global $dir, $views;

        $model = new VisitorModel();
        $pubLists = $model->GetLists();
        $pubTasks = $model->GetTasks();

        require($dir . $views['startMainView']);
        require($dir . $views[$state]);
        require($dir . $views['endMainView']);
    }
}