<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchInput extends Component
{
    public $searchTerm = '';

    public function search()
    {
        $searchTerm = $this->searchTerm;
    if($searchTerm){
        return redirect()->to('/products/search/'.$searchTerm);
    }
    }
    public function render()
    {
        return view('livewire.search-input');
    }
}
