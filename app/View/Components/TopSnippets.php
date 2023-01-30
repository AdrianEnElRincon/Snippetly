<?php

namespace App\View\Components;

use App\Models\Snippet;
use Illuminate\View\Component;

class TopSnippets extends Component
{

    /**
     * The snippet array
     *
     * @var array
     */
    public $snippets;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->snippets = Snippet::orderBy('views', 'DESC')->limit(50)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.top-snippets');
    }
}
