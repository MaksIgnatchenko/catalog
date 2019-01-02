<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 26.12.18
 *
 */

namespace App\Modules\StaticContent\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\StaticContent\DataTables\WhoWeAreDataTable;
use App\Modules\StaticContent\Http\Requests\WhoWeAre\StoreWhoWeAreRequest;
use App\Modules\StaticContent\Http\Requests\WhoWeAre\UpdateWhoWeAreRequest;
use App\Modules\StaticContent\Models\StaticContent;

class WhoWeAreController extends Controller
{
    /**
     * WhoWeAreController constructor.
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
     * @param WhoWeAreDataTable $whoWeAreDataTable
     * @return mixed
     */
    public function index(WhoWeAreDataTable $whoWeAreDataTable)
    {
        return $whoWeAreDataTable->render('whoWeAre.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('whoWeAre.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreWhoWeAreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWhoWeAreRequest $request)
    {
        $supervisor = app()[StaticContent::class];
        $supervisor->fill($request->all());
        $supervisor->save();
        return redirect()->route('who-we-are.index');
    }

    /**
     * Display the specified resource.
     *
     * @param StaticContent $whoWeAre
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(StaticContent $whoWeAre)
    {
        return view('whoWeAre.show', ['whoWeAre' => $whoWeAre]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  StaticContent $whoWeAre
     * @return \Illuminate\Http\Response
     */
    public function edit(StaticContent $whoWeAre)
    {
        return view('whoWeAre.edit', ['whoWeAre' => $whoWeAre] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateWhoWeAreRequest $request
     * @param StaticContent $whoWeAre
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateWhoWeAreRequest $request, StaticContent $whoWeAre)
    {
        $whoWeAre->update($request->all());
        return redirect()->route('who-we-are.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param StaticContent $whoWeAre
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(StaticContent $whoWeAre)
    {
        $whoWeAre->delete();
        return redirect()->route('who-we-are.index');
    }
}
