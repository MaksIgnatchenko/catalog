<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 03.12.2018
 *
 */

namespace App\Modules\Admins\Http\Controllers;

use App\DataTables\TypeDataTable;
use App\Http\Controllers\Controller;
use App\Modules\Admins\Http\Requests\StoreTypeRequest;
use App\Modules\Admins\Http\Requests\UpdateTypeRequest;
use App\Modules\Admins\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param TypeDataTable $typeDataTable
     * @return mixed
     */
    public function index(TypeDataTable $typeDataTable)
    {
        return $typeDataTable->render('type.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeRequest $request)
    {
		$type = app()[Type::class];
		$type->fill($request->all());
		$type->save();
		return redirect()->route('type.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
		return view('type.show')->with('type', $type);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
		return view('type.edit')->with('type', $type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateTypeRequest $request
     * @param  Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
		$type->update($request->all());
		return redirect()->route('type.index');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Type $type
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
    public function destroy(Type $type)
    {
		$type->delete();
		return redirect()->route('type.index');
    }
}