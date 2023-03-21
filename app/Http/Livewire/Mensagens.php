<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Auth;
use App\Models\mensagem;
use Livewire\Component;

class Mensagens extends Component
{
    public $item;
    public $proposta_id;
    public $mensagem;



    

    

    public function rules()
    {
        return [
            
            'mensagem'=>'required',
            
        ];


    }


   public function resetFields(){
    $this->mensagem='';
   }


    public function create(){

        $this->validate();
        mensagem::create([
            'mensagem'=>$this->mensagem,
            'proposta_id'=>$this->proposta_id
        ]);
        $this->resetFields();
        $this->emit("close");
        

        
       
    }






    public function render()
    {
        return view('livewire.mensagem');
    }
}
