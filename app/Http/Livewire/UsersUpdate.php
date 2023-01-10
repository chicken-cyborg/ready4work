<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UsersUpdate extends Component
{


    public $modelId;
    public $role;
    public $name;
    public $email;
    public $modalFormVisible;

    public $teste = true;


    public function mount($modelId=0, $modalFormVisible=true){
        
        
        $this->modelId = $modelId;
        if ($modelId != 0) {
            $data = User::find($this->modelId);

            $this->modalFormVisible = $modalFormVisible;
            $this->name = $data->name;
            $this->role = $data->role;

            
        }
    }

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

    public function modelData()
    {
        return [
            'name' => $this->name,
            'role' => $this->role,
        ];
    }

   
    public function update()
    {
        $this->validate();
        User::find($this->modelId)->update($this->modelData());
        $this->emit("userUpdate", ['modalId'=>$this->modelId]);
        
    }

    public function closemodal(){

        $this->emit("closeModal",['modalId'=>$this->modelId]);
    }


    


    public function render()
    {
        return view('livewire.users-update');
    }
}
