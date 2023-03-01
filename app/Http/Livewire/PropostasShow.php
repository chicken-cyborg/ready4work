<?php

namespace App\Http\Livewire;
use App\Models\Proposta;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class PropostasShow extends Component
{

    use WithPagination;
    public $modelId;

    public  $name, $email,$proposta, $mobile;


    public $sortField = 'proposta';
    public $sortDirection = 'asc';

    public $search='';
    
    public $per_page=6;
    


    public function load(){
        $this->per_page+=3; 
        
    }

    



    public function sortBy($field)
{
    if ($this->sortField === $field) {
        $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
    } else {
        $this->sortField = $field;
        $this->sortDirection = 'asc';
    }
}



    public function render()
    {
        return view('livewire.propostas-show', [
            'data' =>Proposta::paginate($this->per_page),
        ]);
    }
}
