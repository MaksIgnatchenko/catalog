<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 03.12.2018
 *
 */

namespace App\Modules\Advertisement\Http\Controllers;

use App\Modules\Advertisement\Datatables\AdblockDataTable;
use Khsing\World\Models\Country;

class AdblockController
{
    /**
     * Display a listing of the resource.
     *
     * @param AdblockDataTable $categoryDataTable
     * @return mixed
     */
    public function index(AdblockDataTable $categoryDataTable)
    {
        return $categoryDataTable->render('adblock.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::orderBy('name')
            ->get(['id', 'name'])
            ->pluck('name', 'id')
            ->prepend('Select country', null)
            ->toArray();
        return view('adblock.create', ['countries' => $countries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = app()[Category::class];
        $category->fill($request->all());
        $category->save();
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Category $category)
    {
        return view('category.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCategoryRequest $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        return redirect()->route('category.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index');
    }
}