<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 26.12.18
 *
 */

namespace App\Modules\StaticContent\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\StaticContent\DataTables\PrivacyPolicyDataTable;
use App\Modules\StaticContent\Http\Requests\WhoWeAre\PrivacyPolicyRequest;
use App\Modules\StaticContent\Models\StaticContent;

class PrivacyPolicyController extends Controller
{
    /**
     * privacyPolicyController constructor.
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
     * @param PrivacyPolicyDataTable $privacyPolicyDataTable
     * @return mixed
     */
    public function index(PrivacyPolicyDataTable $privacyPolicyDataTable)
    {
        return $privacyPolicyDataTable->render('privacyPolicy.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('privacyPolicy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PrivacyPolicyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PrivacyPolicyRequest $request)
    {
        $supervisor = app()[StaticContent::class];
        $supervisor->fill($request->all());
        $supervisor->save();
        return redirect()->route('privacy-policy.index');
    }

    /**
     * Display the specified resource.
     *
     * @param StaticContent $privacyPolicy
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(StaticContent $privacyPolicy)
    {
        return view('privacyPolicy.show', ['privacyPolicy' => $privacyPolicy]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  StaticContent $privacyPolicy
     * @return \Illuminate\Http\Response
     */
    public function edit(StaticContent $privacyPolicy)
    {
        return view('privacyPolicy.edit', ['privacyPolicy' => $privacyPolicy] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PrivacyPolicyRequest $request
     * @param StaticContent $privacyPolicy
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PrivacyPolicyRequest $request, StaticContent $privacyPolicy)
    {
        $privacyPolicy->update($request->all());
        return redirect()->route('privacy-policy.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param StaticContent $privacyPolicy
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */

    public function destroy(StaticContent $privacyPolicy)
    {
        $privacyPolicy->delete();
        return redirect()->route('privacy-policy.index');
    }
}
