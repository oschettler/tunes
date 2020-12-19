<?php

namespace App\Observers;

class ProjectObserver
{
    public function saving($project)
    {
        //Project::all()->update('is_startpage', false);
    }
}