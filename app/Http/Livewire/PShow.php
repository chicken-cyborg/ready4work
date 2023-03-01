<?php

namespace App\Http\Livewire;
use Livewire\Component;




class PShow extends Component
{


    public $item; 
    
   
    public function render()
    {
        return view('livewire.p-show');
    }
}
