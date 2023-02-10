<?php

namespace App\Http\Livewire;

use App\Models\Community;
use App\Models\Snippet;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SearchBar extends Component
{
    public $search;
    public $snippets;
    public $communities;
    public $users;
    public $results;

    public function mount()
    {
        $this->search = '';
        $this->snippets = [];
        $this->communities = [];
        $this->users = [];
    }

    public function updatedSearch()
    {
        if (empty($this->search)) {
            $this->snippets = [];
            $this->communities = [];
            $this->users = [];
        } else {
            $this->snippets = Snippet::whereFullText('title', 'like', '%' . $this->search . '%')->limit(10)->get();
            $this->communities = Community::where('name', 'like', '%' . $this->search . '%')->limit(10)->get();
            $this->users = User::where('name', 'like', '%' . $this->search . '%')->limit(10)->get();
        }
    }

    public function render()
    {
        return view('livewire.search-bar');
    }
}
