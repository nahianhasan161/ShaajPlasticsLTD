<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;

class CompanyTable extends Component
{
    use WithPagination;
    protected $paginationTheme= 'bootstrap';
    protected $listeners= ['refresh' => '$refresh','deleteConfirmed'];
    public $Model;
    public function getCompaniesProperty()
    {
        return $this->Model::paginate();
    }
    public function deleteConfirmed($id)
    {
        $product = $this->Model::where('id',$id)->first();
        if($product){

            $product->delete();
            $this->emit('alert',['icon' => 'success', 'title' => "'$product->name'" .' got deleted successfully']);
        }else{
            $this->emit('alert',['icon' => 'error', 'title' => $product->name .'   delete is Unsuccessfully']);
        }
    }
    public function render()
    {

        return view('livewire.company-table',['companies' => $this->companies]);
    }
}
