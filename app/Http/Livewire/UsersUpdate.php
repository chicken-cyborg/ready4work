<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Livewire\Component;
use phpDocumentor\Reflection\Types\False_;

class UsersUpdate extends Component
{


    public $modelId;
    public $role;
    public $name;
    public $email;
    public $password;

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
            'password'=>'required',
            'email'=>'required',
        ];


    }

    public function modelData($newpassword=false)
    {
        if ($newpassword) {

            return [
                'name' => $this->name,
                'role' => $this->role,
                'password'=>Hash::make($this->password),
                'email'=>$this->email,
            ];
        }


        return [
            'name' => $this->name,
            'role' => $this->role,
            'email'=>$this->email,
        ];
    }

   
    public function update()
    {
        $this->validate();
        User::find($this->modelId)->update($this->modelData());
        $this->emit("userUpdate", ['modalId'=>$this->modelId]);
        
    }

    public function create()
    {
        $this->validate();
        User::create($this->modelData(true));
        $this->reset();
        $this->emit("userCreate");
    }

    public function closemodal(){

        $this->emit("closeModal",['modalId'=>$this->modelId]);
    }


    public function render()
    {
        return view('livewire.users-update');
    }
}
