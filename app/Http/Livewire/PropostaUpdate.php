<?php

namespace App\Http\Livewire;

use App\Models\Proposta;
use Livewire\Component;

class PropostaUpdate extends Component
{


    

    public $modalFormVisible;
    public $modalConfirmDeleteVisible;

    public $modelId;

    /**
     * Meter as variaveis aqui
     */
    public  $name, $email,$proposta, $mobile;
    public $teste = true;


    public function mount($modelId=0, $modalFormVisible=true){
        
        
        $this->modelId = $modelId;
       
        if ($modelId != 0) {
            $data = Proposta::find($this->modelId);
            if($data){
            $this->modalFormVisible = $modalFormVisible;
            $this->proposta = $data->proposta;
            $this->mobile = $data->mobile;
            
             }
                 else{
                     $this->modelId = 0;
                     }
        } 
    }

    public function rules()
    {
        return [
            
            'proposta'=>'required',
            'mobile'=>'required| numeric',
        ];


    }

    public function modelData()
    {
            return [
                
                'mobile' => $this->mobile,
                'proposta'=>$this->proposta,
                
            ];
         
    }

    public function update()
    {
        $this->validate();
        Proposta::find($this->modelId)->update($this->modelData());
        $this->emit("crudUpdate", ['modalId'=>$this->modelId]);
        
    }

    public function create()
    {
        $this->validate();
        Proposta::create($this->modelData());
        $this->reset();
        $this->emit("crudCreate");
        
    }

    
    public function closemodal(){

        $this->emit("closeModal",['modalId'=>$this->modelId]);
    }
    
    public function render()
    {
        return view('livewire.propostas-update');
    }
}
