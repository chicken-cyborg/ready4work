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

    
    public $per_page=3;
    


    public function load(){
        $this->per_page+=3; 
        
    }

    






    public function render()
    {
        return view('livewire.propostas-show', [
            'data' =>Proposta::paginate($this->per_page),
        ]);
    }
}
