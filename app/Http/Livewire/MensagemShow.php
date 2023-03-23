<?php

namespace App\Http\Livewire;
use App\Models\mensagem;
use App\Models\Proposta;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
class MensagemShow extends Component
{
    use WithPagination;

    public  $name, $email,$proposta, $mobile, $usersend_id,$proposta_id,$mensagem;


    public $per_page=6;
    


    public function load(){
        $this->per_page+=3; 
        
    
    }


 

    public function render()
    {
        
        $propostas = Proposta::with('mensagens')->where('user_id', '2' )->get();
        return view('livewire.mensagem.mensagem-show',[
            'propostas'=>$propostas,
        ]);
    }
}
