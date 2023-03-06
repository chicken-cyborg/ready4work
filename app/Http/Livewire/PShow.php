<?php

namespace App\Http\Livewire;
use Livewire\Component;




class PShow extends Component
{

    public $modalFormVisible=false;
    public $item; 
    
   public function modalVisible(){
    $this->modalFormVisible=true;
   }

   public function closemodal(){
    $this->modalFormVisible=false;
   }




    public function render()
    {
        return view('livewire.p-show');
    }
}
