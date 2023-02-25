<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Http\Requests\StoreCommunityRequest;
use App\Http\Requests\UpdateCommunityRequest;
use App\Models\Snippet;
use App\Models\Subscription;

class CommunityController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'communities' => auth()->user()->communities->sortByDesc('created_at')
        ];

        return view('communities.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('communities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommunityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommunityRequest $request)
    {
        $data = $request->validated();

        $community = Community::factory()->create([
            'name' => $data['name'],
            'description' => $data['description'],
        ]);

        Subscription::factory()->create([
            'user_id' => auth()->user()->id,
            'community_id' => $community->id,
            'is_owner' => true,
        ]);

        return redirect()->to(route('communities.index'))->with('success', __('communities.messages.created', ['community' => $community->name]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function show(Community $community)
    {
        $snippets = Snippet::where('community_id', '=', $community->id)->get();

        return view('communities.show', compact('community', 'snippets'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function edit(Community $community)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCommunityRequest  $request
     * @param  \App\Models\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommunityRequest $request, Community $community)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function destroy(Community $community)
    {
        //
    }

    public function subscribe(Community $community)
    {
        Subscription::create([
            'user_id' => auth()->user()->id,
            'community_id' => $community->id,
        ]);;

        return redirect()->back()->with('success', __('communities.messages.subscribed', ['community' => $community->name]));
    }

    public function unsubscribe(Community $community)
    {
        Subscription::where('user_id', '=', auth()->user()->id)->where('community_id', '=', $community->id)->delete();

        return redirect()->back()->with('success', __('communities.messages.unsubscribed', ['community' => $community->name]));
    }
}
