<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDataRequest;
use App\Http\Requests\UpdateDataRequest;
use App\Data;
use Illuminate\Http\Request;
use Knowfox\Crud\Services\Crud;

class DataController extends Controller
{
    protected $crud;

    public function __construct(Crud $crud)
    {
        parent::__construct();
        $this->crud = $crud;
        $crud->setup('tunes.data');
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
    public function store(CreateDataRequest $request)
    {
        list($data, $response) = $this->crud->store($request);
        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function edit(Data $data)
    {
        return $this->crud->edit($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDataRequest $request, Data $data)
    {
        return $this->crud->update($request, $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Data $data)
    {
        return response()->json($data); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Data $data)
    {
        return $this->crud->destroy($project);
    }
}
