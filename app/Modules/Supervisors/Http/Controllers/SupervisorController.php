<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 25.12.18
 *
 */

namespace App\Modules\Supervisors\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Admins\Models\Admin;
use App\Modules\Permissions\DataTables\RoleDataTable;
use App\Modules\Permissions\Http\Requests\StoreRoleRequest;
use App\Modules\Permissions\Http\Requests\UpdateRoleRequest;
use App\Modules\Permissions\Models\Permission;
use App\Modules\Permissions\Models\Role;
use App\Modules\Supervisors\DataTables\SupervisorDataTable;
use App\Modules\Supervisors\Http\Requests\StoreSupervisorRequest;
use App\Modules\Supervisors\Http\Requests\UpdateSupervisorRequest;

class SupervisorController extends Controller
{
    /**
     * SupervisorController constructor.
     */
    public function __construct()
    {
        $this->middleware('permission:index_supervisors')->only('index');
        $this->middleware('permission:read_supervisors')->only('show');
        $this->middleware('permission:create_supervisors')->only(['create', 'store']);
        $this->middleware('permission:edit_supervisors')->only(['edit', 'update']);
        $this->middleware('permission:delete_supervisors')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @param SupervisorDataTable $supervisorsDataTable
     * @return mixed
     */
    public function index(SupervisorDataTable $supervisorsDataTable)
    {
        return $supervisorsDataTable->render('supervisor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all(['id', 'display_name']);
        return view('supervisor.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSupervisorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSupervisorRequest $request)
    {
        $supervisor = app()[Admin::class];
        $supervisor->fill($request->all());
        $supervisor->save();
        $supervisor->syncRoles($request->roles);
        return redirect()->route('supervisor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Admin $supervisor
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Admin $supervisor)
    {
        return view('supervisor.show', ['supervisor' => $supervisor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Admin  $supervisor
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $supervisor)
    {
        $roles = Role::all(['id', 'display_name']);
        $selectedRoles = $supervisor->roles->pluck('id', 'id')->toArray();
        return view('supervisor.edit', ['supervisor' => $supervisor, 'roles' => $roles, 'selectedRoles' => $selectedRoles] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSupervisorRequest $request
     * @param Admin $supervisor
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateSupervisorRequest $request, Admin $supervisor)
    {
        $supervisor->update($request->all());
        $supervisor->syncRoles($request->roles);
        return redirect()->route('supervisor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Admin $supervisor
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Admin $supervisor)
    {
        $supervisor->delete();
        return redirect()->route('supervisor.index');
    }
}
