<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 26.12.18
 *
 */

namespace App\Modules\StaticContent\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\StaticContent\DataTables\HelpDataTable;
use App\Modules\StaticContent\Http\Requests\WhoWeAre\HelpRequest;
use App\Modules\StaticContent\Models\StaticContent;

class HelpController extends Controller
{
    /**
     * helpController constructor.
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
     * @param HelpDataTable $helpDataTable
     * @return mixed
     */
    public function index(HelpDataTable $helpDataTable)
    {
        return $helpDataTable->render('help.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('help.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  HelpRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HelpRequest $request)
    {
        $supervisor = app()[StaticContent::class];
        $supervisor->fill($request->all());
        $supervisor->save();
        return redirect()->route('help.index');
    }

    /**
     * Display the specified resource.
     *
     * @param StaticContent $help
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(StaticContent $help)
    {
        return view('help.show', ['help' => $help]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  StaticContent $help
     * @return \Illuminate\Http\Response
     */
    public function edit(StaticContent $help)
    {
        return view('help.edit', ['help' => $help] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param HelpRequest $request
     * @param StaticContent $help
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(HelpRequest $request, StaticContent $help)
    {
        $help->update($request->all());
        return redirect()->route('help.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param StaticContent $help
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(StaticContent $help)
    {
        $help->delete();
        return redirect()->route('help.index');
    }
}
