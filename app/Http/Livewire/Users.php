<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $modalFormVisible;
    public $modalConfirmDeleteVisible;
    public $modelId;

    /**
     * Put your custom public properties here!
     */
    public $role;
    public $name;
    public $email;
    public $password;

    protected $listeners=[
        'userUpdate'=>'updateCloseModal',
        'closeModal'=>'updateCloseModal',
        'userCreate'=>'createCloseModal',
    ];

    /**
     * Regras de validação
     *
     * @return void
     */
    public function rules() 
    {
        return [
            'name' => 'required',
            'role' => 'required',

        ];


    }

    /**
     * Carrega o modelo da data
     * do componente
     *
     * @return void
     */
    public function loadModel()
    {
        $data = User::find($this->modelId);
        // Assign the variables here
        $this->name = $data->name;
        $this->role = $data->role;

 
    }

    

  

    /**
     * Função que lê
     *
     * @return void
     */
    public function read()
    {
        return User::paginate(5);
    }

    

    /**
     * Função de delete.
     *
     * @return void
     */
    public function delete()
    {
        User::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        $this->resetPage();
    }

    /**
     * Mostra o modal de criação
     *
     * @return void
     */
    public function createShowModal()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
    }

    /**
     * Mostra o modal
     * em modo de edição
     *
     * @param  mixed $id
     * @return void
     */
    public function updateShowModal($id)
    {
        
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
        $this->modelId = $id;
        $this->loadModel();
        
        
    }

    public function updateCloseModal($modelId){
        $this->modalFormVisible = false;
    }

    public function createCloseModal(){
        $this->modalFormVisible = false;
    }
    
    /**
     * Mostra o modal de confimação
     * 
     * @param  mixed $id
     * @return void
     */
    public function deleteShowModal($id)
    {
        $this->modelId = $id;
        $this->modalConfirmDeleteVisible = true;
    }

    public function render()
    {
        return view('livewire.users', [
            'data' => $this->read(),
        ]);
    }

}