<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 26.12.18
 *
 */

namespace App\Modules\StaticContent\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\StaticContent\DataTables\TermDataTable;
use App\Modules\StaticContent\Http\Requests\WhoWeAre\TermRequest;
use App\Modules\StaticContent\Models\StaticContent;

class TermController extends Controller
{
    /**
     * termController constructor.
     */
    public function __construct()
    {
        $this->middleware('permission:index_static_content')->only('index');
        $this->middleware('permission:read_static_content')->only('show');
        $this->middleware('permission:create_static_content')->only(['create', 'store']);
        $this->middleware('permission:edit_static_content')->only(['edit', 'update']);
        $this->middleware('permission:delete_static_content')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @param TermDataTable $termDataTable
     * @return mixed
     */
    public function index(TermDataTable $termDataTable)
    {
        return $termDataTable->render('terms.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('terms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TermRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TermRequest $request)
    {
        $supervisor = app()[StaticContent::class];
        $supervisor->fill($request->all());
        $supervisor->save();
        return redirect()->route('term.index');
    }

    /**
     * Display the specified resource.
     *
     * @param StaticContent $term
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(StaticContent $term)
    {
        return view('term.show', ['term' => $term]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  StaticContent $term
     * @return \Illuminate\Http\Response
     */
    public function edit(StaticContent $term)
    {
        return view('term.edit', ['term' => $term] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TermRequest $request
     * @param StaticContent $term
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TermRequest $request, StaticContent $term)
    {
        $term->update($request->all());
        return redirect()->route('term.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param StaticContent $term
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(StaticContent $term)
    {
        $term->delete();
        return redirect()->route('term.index');
    }
}
