<?php

namespace App\Http\Livewire;

use App\Models\Community;
use App\Models\Snippet;
use App\Models\User;
use Livewire\Component;

class SearchBar extends Component
{
    public $search = '';

    public function render()
    {

        $data = [
            'snippets' => array(),
            'communities' => array(),
            'users' => array(),
        ];


        if ($this->search !== '') {
            $data['snippets'] =  Snippet::where('title', 'like', $this->search . '%')->limit(10)->get();
            $data['users'] = User::where('name', 'like', $this->search . '%')->limit(10)->get();
            $data['communities'] = Community::where('name', 'like', $this->search . '%')->limit(10)->get();
        }

        return view('livewire.search-bar', $data);
    }
}
