<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Http\Requests\StoreCommunityRequest;
use App\Http\Requests\UpdateCommunityRequest;
use App\Models\Subscription;

class CommunityController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Search
     *
     *
     */
    public function search()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'communities' => auth()->user()->communities
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function show(Community $community)
    {
        //
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
