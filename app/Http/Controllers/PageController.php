<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Knowfox\Crud\Services\Crud;

class PageController extends Controller
{
    protected $crud;

    public function __construct(Crud $crud)
    {
        parent::__construct();
        $this->crud = $crud;
        $crud->setup('tunes.page');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $page = Page::where('is_startpage', true)->first();

        if (!$page) {
            if (Page::count() == 0) {
                return redirect()->route('page.create')
                    ->with('error', 'Create a page and mark it as startpage');
            }
            else {
                return redirect()->route('page.index')
                    ->with('error', 'Select a page and mark it as startpage');
            }
        }
        return view('page.show', ['page' => $page]);
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
    public function store(Request $request)
    {
        list($page, $response) = $this->crud->store($request);
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }
}
