<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Auth;
use App\Models\mensagem;
use App\Models\Proposta;
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


    public function modelData()
    {
            return [
                
                
                'mensagem'=>$this->mensagem,
                'proposta_id'=>$this->proposta_id,
                
            ];
         
    }


    public function create(){

        $this->validate();
        mensagem::create($this->modelData());
        $this->reset();
    }






    public function render()
    {
        return view('livewire.mensagem');
    }
}
