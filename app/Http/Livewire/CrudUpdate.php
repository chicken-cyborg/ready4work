<?php

namespace App\Http\Livewire;

use Models\Student;
use Livewire\Component;

class CrudUpdate extends Component
{


   

    public $modalFormVisible;
    public $modalConfirmDeleteVisible;

    public $modelId;

    /**
     * Meter as variaveis aqui
     */
    public  $name, $email,$proposta, $mobile;
    

    
    public function render()
    {
        return view('livewire.crud-update');
    }
}
