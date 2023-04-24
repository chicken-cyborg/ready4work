<?php

namespace App\Http\Livewire;
use Livewire\Component;




class PShow extends Component
{

  protected $listeners=[
    'close'=>'mensagemclose',
]; 
    public $modalFormVisible=false;
    public $modalFormVisible2=false;
    public $item; 
    
   public function modalVisible(){
    $this->modalFormVisible=true;
   }

   public function closemodal(){
    $this->modalFormVisible=false;
   }

  public function mensagem(){
    $this->modalFormVisible2=true;
  }

  public function mensagemclose(){
    $this->modalFormVisible2=false;
  }


    public function render()
    {
        return view('livewire.propostas.p-show');
    }
}
