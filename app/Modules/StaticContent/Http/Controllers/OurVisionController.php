<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 26.12.18
 *
 */

namespace App\Modules\StaticContent\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\StaticContent\DataTables\OurVisionDataTable;
use App\Modules\StaticContent\Http\Requests\OurVision\OurVisionRequest;
use App\Modules\StaticContent\Models\StaticContent;

class OurVisionController extends Controller
{
    /**
     * OurVisionController constructor.
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
     * @param OurVisionDataTable $ourVisionDataTable
     * @return mixed
     */
    public function index(OurVisionDataTable $ourVisionDataTable)
    {
        return $ourVisionDataTable->render('ourVision.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ourVision.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ourVisionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OurVisionRequest $request)
    {
        $supervisor = app()[StaticContent::class];
        $supervisor->fill($request->all());
        $supervisor->save();
        return redirect()->route('our-vision.index');
    }

    /**
     * Display the specified resource.
     *
     * @param StaticContent $ourVision
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(StaticContent $ourVision)
    {
        return view('ourVision.show', ['ourVision' => $ourVision]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  StaticContent $ourVision
     * @return \Illuminate\Http\Response
     */
    public function edit(StaticContent $ourVision)
    {
        return view('ourVision.edit', ['ourVision' => $ourVision] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param OurVisionRequest $request
     * @param StaticContent $ourVision
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(OurVisionRequest $request, StaticContent $ourVision)
    {
        $ourVision->update($request->all());
        return redirect()->route('our-vision.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param StaticContent $ourVision
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(StaticContent $ourVision)
    {
        $ourVision->delete();
        return redirect()->route('our-vision.index');
    }
}
