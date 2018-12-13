<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 03.12.2018
 *
 */

namespace App\Modules\Admins\Http\Controllers;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Modules\Admins\Http\Requests\StoreCategoryRequest;
use App\Modules\Admins\Http\Requests\UpdateCategoryRequest;
use App\Modules\Admins\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param CategoryDataTable $categoryDataTable
     * @return mixed
     */
    public function index(CategoryDataTable $categoryDataTable)
    {
        return $categoryDataTable->render('category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('category.create');
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
