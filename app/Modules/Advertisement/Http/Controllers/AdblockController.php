<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 03.12.2018
 *
 */

namespace App\Modules\Advertisement\Http\Controllers;

use App\Modules\Advertisement\Datatables\AdblockDataTable;
use App\Modules\Advertisement\Enums\AdblockTypesEnum;
use App\Modules\Advertisement\Http\Requests\StoreAdblockRequest;
use App\Modules\Advertisement\Models\Adblock;

class AdblockController
{
    /**
     * Display a listing of the resource.
     *
     * @param AdblockDataTable $adblockDataTable
     * @return mixed
     */
    public function index(AdblockDataTable $adblockDataTable)
    {
        return $adblockDataTable->render('adblock.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $geographyService = app()[\App\Modules\Geography\Services\GeographyServiceInterface::class];
        $countries = $geographyService
            ->getCountries()
            ->pluck('name', 'id')
            ->toArray();
        $adTypes = AdblockTypesEnum::getPositions();
        $types = [];
        foreach ($adTypes as $type) {
            $types[$type] = $type;
        }
        return view('adblock.create', ['countries' => $countries, 'types' => $types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreAdblockRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdblockRequest $request)
    {
        $adblock = app()[Adblock::class];
        $adblock->fill($request->all());
        $adblock->save();
        return redirect()->route('adblock.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Adblock $adblock
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Adblock $adblock)
    {
        $adblock->delete();
        return redirect()->route('adblock.index');
    }
}
