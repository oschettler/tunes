<?php
/**
 * This file is part of the Tunes HTML/CSS/Javascript editor (https://github.com/oschettler/tunes).
 * Copyright (c) 2018 Olav Schettler.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, version 3.
 *
 * This program is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Resources\ImageResource;
use App\Project;
use Illuminate\Http\Request;
use Knowfox\Crud\Services\Crud;

class ProjectController extends Controller
{
    protected $crud;

    public function __construct(Crud $crud)
    {
        parent::__construct();
        $this->crud = $crud;
        $crud->setup('tunes.project');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $project = Project::where('is_startpage', true)->first();

        if (!$project) {
            if (Project::count() == 0) {
                return redirect()->route('project.create')
                    ->with('error', 'Create a project and mark it as startpage');
            }
            else {
                return redirect()->route('project.index')
                    ->with('error', 'Select a project and mark it as startpage');
            }
        }
        return view(config('crud.theme') . '.project.show', ['entity' => $project]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->crud->index($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->crud->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request)
    {
        list($project, $response) = $this->crud->store($request);
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Project $project)
    {
        if ($request->route()->getName() != 'home' && $project->is_startpage) {
            return redirect()->route('home');
        }

        return view(config('crud.theme') . '.project.show', ['entity' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return $this->crud->edit($project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $page
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        return $this->crud->update($request, $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        return $this->crud->destroy($project);
    }

    public function images(Project $project)
    {
        return ImageResource::collection($project->getMedia('images'));
    }
}
