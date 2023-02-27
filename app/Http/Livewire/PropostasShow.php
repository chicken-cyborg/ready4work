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


    public $sortField = 'proposta';
    public $sortDirection = 'asc';

    public $search='';
    
    /**
     * Carrega os dados do modelo.
     *
     * @return void
     */
    public function loadModel()
    {
        $data = Proposta::find($this->modelId);
        // Designa as variaveis que queres inserir na base de dados.
        $this->name = $data->name;
        $this->email = $data->email;
        $this->proposta = $data->proposta;
        $this->mobile = $data->mobile;


    }


     /** 
     * Função de leitura.
     *
     * @return void
     */
    public function read()
    {
            return Proposta::where('proposta','like','%'.$this->search.'%')->orderBy($this->sortField, $this->sortDirection)->paginate(3);
    }



    public function sortBy($field)
{
    if ($this->sortField === $field) {
        $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
    } else {
        $this->sortField = $field;
        $this->sortDirection = 'asc';
    }
}



    public function render()
    {
        return view('livewire.propostas-show', [
            'data' => $this->read(),
        ]);
    }
}
