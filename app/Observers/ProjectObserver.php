<?php

namespace App;

class ProjectObserver
{
    public function saving($project)
    {
        Project::update('is_startpage', false);
    }
}