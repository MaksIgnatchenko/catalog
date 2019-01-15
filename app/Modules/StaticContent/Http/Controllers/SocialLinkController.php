<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 26.12.18
 *
 */

namespace App\Modules\StaticContent\Http\Controllers;

use App\Helpers\FieldPrettyName;
use App\Http\Controllers\Controller;
use App\Modules\StaticContent\DataTables\SocialLinkDataTable;
use App\Modules\StaticContent\Enums\SocialResourceEnum;
use App\Modules\StaticContent\Http\Requests\SocialLink\StoreSocialLinkRequest;
use App\Modules\StaticContent\Http\Requests\SocialLink\UpdateSocialLinkRequest;
use App\Modules\StaticContent\Models\SocialLink;

class SocialLinkController extends Controller
{
    /**
     * termController constructor.
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
     * @param SocialLinkDataTable $socialLinkTable
     * @return mixed
     */
    public function index(SocialLinkDataTable $socialLinkTable)
    {
        return $socialLinkTable->render('socialLink.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $socialResources = $this->getSocialResourcesForSelect();
        return view('socialLink.create', ['socialResources' => $socialResources]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSocialLinkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSocialLinkRequest $request)
    {
        $supervisor = app()[SocialLink::class];
        $supervisor->fill($request->all());
        $supervisor->save();
        return redirect()->route('social-link.index');
    }


    /**
     * Display the specified resource.
     *
     * @param SocialLink $socialLink
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(SocialLink $socialLink)
    {
        return view('socialLink.show', ['socialLink' => $socialLink]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  SocialLink $socialLink
     * @return \Illuminate\Http\Response
     */
    public function edit(SocialLink $socialLink)
    {
        $socialResources = $this->getSocialResourcesForSelect();
        return view('socialLink.edit', ['socialResources' => $socialResources, 'socialLink' => $socialLink] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSocialLinkRequest $request
     * @param SocialLink $socialLink
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateSocialLinkRequest $request, SocialLink $socialLink)
    {
        $socialLink->update($request->all());
        return redirect()->route('social-link.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param SocialLink $socialLink
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */

    public function destroy(SocialLink $socialLink)
    {
        $socialLink->delete();
        return redirect()->route('social-link.index');
    }

    /**
     * @return array
     */
    protected function getSocialResourcesForSelect() : array
    {
        $availableSocialResources = SocialResourceEnum::getAvailable();
        $socialResources = [];
        foreach($availableSocialResources as $resource) {
            $socialResources[$resource] = FieldPrettyName::transform($resource);
        }
        return $socialResources;
    }
}