<?php

namespace App\Http\Livewire;

use App\Models\RowMetarial;
use Livewire\Component;
use Livewire\WithPagination;

class RowMetarialTable extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $factory ;
    public $Modal = 'App\\Models\\RowMetarial';

    protected $listeners = ['deleteConfirmed' => 'deleteRowMeterial','refreshRowMeterial' => '$refresh'];



    public function deleteRowMeterial(RowMetarial $metarial)
    {
        $metarial->delete();
        $this->emit('alert',['icon' => 'success','title' => $metarial->name.' is successfully deleted']);
    }
    public function getRowMetarialsProperty()
    {
        return $this->factory->rowmeterials()->paginate(5);
    }
    public function render()
    {
        $rowMetarials = $this->rowMetarials;
        return view('livewire.row-metarial-table',[ 'datas' => $rowMetarials ]);
    }
}
