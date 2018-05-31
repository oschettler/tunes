<?php

namespace App;

class ProjectObserver
{
    public function saving($project)
    {
        //Project::all()->update('is_startpage', false);
    }
}