<?php

namespace App\Http\Livewire;
use App\Models\mensagem;
use App\Models\Proposta;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class MensagemShow extends Component
{
    use WithPagination;

    public $modelId,$m;

    public $modalConfirmDeleteVisible=false;

    public $modalFormVisible=false;
    public $per_page=6;
    
    public function load(){
        $this->per_page+=3; 
        
    
    }

    public function delete()
    {
        mensagem::destroy($this->modelId);
        $this->resetPage();
    }

    public function deleteShowModal($id)
    {
        $this->modelId = $id;
        $this->modalConfirmDeleteVisible = true;
    }

    public function modalVisible(){
        $this->modalFormVisible=true;
       }
    
       public function closemodal(){
        $this->modalFormVisible=false;
       }


 

    public function render()
    {
        
        

       

        if(Auth::user()->role=="admin"){
          
        $propostas = Proposta::with('mensagens')->get();


        }

        else{
            $propostas = Proposta::with('mensagens')
        ->where('user_id', Auth::id())
        ->has('mensagens')
        ->get();

    if ($propostas->isEmpty()) {
    return view('livewire.mensagem.norecord');
    }
        }
  
        
        return view('livewire.mensagem.mensagem-show',[
            'propostas'=>$propostas,
           
        ]);
    }
}
