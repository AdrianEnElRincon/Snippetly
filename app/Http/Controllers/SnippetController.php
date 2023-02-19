<?php

namespace App\Http\Controllers;

use App\Enums\Languages;
use App\Models\Snippet;
use App\Http\Requests\StoreSnippetRequest;
use App\Http\Requests\UpdateSnippetRequest;
use App\Models\Comment;
use App\Models\Language;

class SnippetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('snippets.index', ['snippets' => Snippet::where('user_id', '=', auth()->user()->id)->latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'languages' => Language::all(),
            'communities' => auth()->user()->communities,
        ];

        return view('snippets.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSnippetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSnippetRequest $request)
    {
        $data = $request->validated();

        $snippet = Snippet::factory()->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'lang_id' => Language::where('name', '=', $data['language'])->first()->id,
            'content' => $data['content'],
            'user_id' => auth()->user()->id
        ]);

        return redirect()->to(route('snippets.show', $snippet))->with('success', __('snippets.messages.created', ['snippet' => $snippet->title]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Snippet  $snippet
     * @return \Illuminate\Http\Response
     */
    public function show(Snippet $snippet)
    {
        $data = [
            'snippet' => $snippet,
            'comments' => match (request()->sortBy) {
                'popular' => $snippet->comments->sortByDesc('likes'),
                'controversial' => $snippet->comments->sortByDesc('dislikes'),
                'recent' => $snippet->comments->sortByDesc('created_at'),
                default => $snippet->comments->sortByDesc('likes')
            }
        ];

        return view('snippets.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Snippet  $snippet
     * @return \Illuminate\Http\Response
     */
    public function edit(Snippet $snippet)
    {
        $data = [
            'snippet' => $snippet,
            'languages' => Language::all()
        ];

        return view('snippets.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSnippetRequest  $request
     * @param  \App\Models\Snippet  $snippet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSnippetRequest $request, Snippet $snippet)
    {
        $data = $request->validated();

        $snippet->title = $data['title'];
        $snippet->description = $data['description'];
        $snippet->lang = Language::where('name', '=', $data['language'])->get();
        $snippet->content = $data['content'];

        return redirect()->to(route('snippets.show', $snippet))->with('success', __('snippets.messages.updated', ['snippet' => $snippet->title]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Snippet  $snippet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Snippet $snippet)
    {
        $snippet->delete();

        return redirect()->to(route('snippets.index'))->with('success', __('snippets.messages.deleted', ['snippet' => $snippet->title]));
    }

    public function like(Snippet $snippet)
    {
        $snippet->likes++;

        $snippet->save();

        return redirect()->back();
    }

    public function dislike(Snippet $snippet)
    {
        $snippet->dislikes++;

        $snippet->save();

        return redirect()->back();
    }
}
