<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 26.12.18
 *
 */

namespace App\Modules\StaticContent\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\StaticContent\DataTables\WhoWeAreDataTable;

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

//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function create()
//    {
//        $roles = Role::all(['id', 'display_name']);
//        return view('supervisor.create', ['roles' => $roles]);
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  StoreSupervisorRequest  $request
//     * @return \Illuminate\Http\Response
//     */
//    public function store(StoreSupervisorRequest $request)
//    {
//        $supervisor = app()[Admin::class];
//        $supervisor->fill($request->all());
//        $supervisor->save();
//        $supervisor->syncRoles($request->roles);
//        return redirect()->route('supervisor.index');
//    }
//
//    /**
//     * Display the specified resource.
//     *
//     * @param Admin $supervisor
//     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
//     */
//    public function show(Admin $supervisor)
//    {
//        return view('supervisor.show', ['supervisor' => $supervisor]);
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  Admin  $supervisor
//     * @return \Illuminate\Http\Response
//     */
//    public function edit(Admin $supervisor)
//    {
//        $roles = Role::all(['id', 'display_name']);
//        $selectedRoles = $supervisor->roles->pluck('id', 'id')->toArray();
//        return view('supervisor.edit', ['supervisor' => $supervisor, 'roles' => $roles, 'selectedRoles' => $selectedRoles] );
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param UpdateSupervisorRequest $request
//     * @param Admin $supervisor
//     * @return \Illuminate\Http\RedirectResponse
//     */
//    public function update(UpdateSupervisorRequest $request, Admin $supervisor)
//    {
//        $supervisor->update($request->all());
//        $supervisor->syncRoles($request->roles);
//        return redirect()->route('supervisor.index');
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param Admin $supervisor
//     * @return \Illuminate\Http\RedirectResponse
//     * @throws \Exception
//     */
//    public function destroy(Admin $supervisor)
//    {
//        $supervisor->delete();
//        return redirect()->route('supervisor.index');
//    }
}
