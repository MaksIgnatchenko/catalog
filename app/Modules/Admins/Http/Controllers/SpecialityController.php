<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 03.12.2018
 *
 */

namespace App\Modules\Admins\Http\Controllers;

use App\DataTables\SpecialityDataTable;
use App\Http\Controllers\Controller;
use App\Modules\Admins\Http\Requests\StoreSpecialityRequest;
use App\Modules\Admins\Http\Requests\UpdateSpecialityRequest;
use App\Modules\Admins\Models\Speciality;
use Illuminate\Http\Request;

class SpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param SpecialityDataTable $specialityDataTable
     * @return mixed
     */
    public function index(SpecialityDataTable $specialityDataTable)
    {
        return $specialityDataTable->render('speciality.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('speciality.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSpecialityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpecialityRequest $request)
    {
		$speciality = app()[Speciality::class];
		$speciality->fill($request->all());
		$speciality->save();
		return redirect()->route('speciality.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Speciality  $speciality
     * @return \Illuminate\Http\Response
     */
    public function show(Speciality $speciality)
    {
		return view('speciality.show')->with('speciality', $speciality);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Speciality  $speciality
     * @return \Illuminate\Http\Response
     */
    public function edit(Speciality $speciality)
    {
		return view('speciality.edit')->with('speciality', $speciality);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSpecialityRequest $request
     * @param  Speciality  $speciality
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpecialityRequest $request, Speciality $speciality)
    {
		$speciality->update($request->all());
		return redirect()->route('speciality.index');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Speciality $speciality
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
    public function destroy(Speciality $speciality)
    {
		$speciality->delete();
		return redirect()->route('speciality.index');
    }
}