<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 25.12.18
 *
 */

namespace App\Modules\Permissions\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Permissions\DataTables\RoleDataTable;
use App\Modules\Permissions\Http\Requests\StoreRoleRequest;
use App\Modules\Permissions\Http\Requests\UpdateRoleRequest;
use App\Modules\Permissions\Models\Permission;
use App\Modules\Permissions\Models\Role;

class RoleController extends Controller
{
    /**
     * RoleController constructor.
     */
    public function __construct()
    {
        $this->middleware('permission:index_roles')->only('index');
        $this->middleware('permission:read_roles')->only('show');
        $this->middleware('permission:create_roles')->only(['create', 'store']);
        $this->middleware('permission:edit_roles')->only(['edit', 'update']);
        $this->middleware('permission:delete_roles')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @param RoleDataTable $roleDataTable
     * @return mixed
     */
    public function index(RoleDataTable $roleDataTable)
    {
        return $roleDataTable->render('role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all(['id', 'display_name']);
        return view('role.create', ['permissions' => $permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        $role = app()[Role::class];
        $role->fill($request->all());
        $role->save();
        $role->syncPermissions($request->permissions);
        return redirect()->route('role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Role $role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Role $role)
    {
        return view('role.show', ['role' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all(['id', 'display_name']);
        $selectedPermissions = $role->permissions->pluck('id', 'id')->toArray();
        return view('role.edit', ['role' => $role, 'permissions' => $permissions, 'selectedPermissions' => $selectedPermissions] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRoleRequest $request
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->all());
        $role->syncPermissions($request->permissions);
        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('role.index');
    }
}
