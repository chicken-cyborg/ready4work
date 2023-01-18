<?php
namespace App\Http\Livewire;
use Illuminate\Support\Facades\Auth;
use App\Models\Proposta;
use Livewire\Component;
use Livewire\WithPagination;
class Propostas extends Component
{
    
    
    use WithPagination;

    public $modalFormVisible;
    public $modalConfirmDeleteVisible;

    public $modelId;

    /**
     * Meter as variaveis aqui
     */
    public  $name, $email,$proposta, $mobile;



    protected $listeners=[
        'crudUpdate'=>'updateCloseModal',
        'closeModal'=>'updateCloseModal',
        'crudCreate'=>'createCloseModal',
    ];

    /**
     * As regras de validação
     *
     * @return void
     */
    public function rules()
    {
        return [
            'proposta' => 'required',
           

        ];


    }

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
     * The read function.
     *
     * @return void
     */
    public function read()
    {

        return Proposta::whereUserId(Auth::id())->paginate(20);
    }



    /**
     * The delete function.
     *
     * @return void
     */
    public function delete()
    {
        Proposta::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        $this->resetPage();
    }

    /**
     * Shows the create modal
     *
     * @return void
     */
    public function createShowModal()
    {
        $this->resetValidation();
        $this->modalFormVisible = true;
    }

    /**
     * Shows the form modal
     * in update mode.
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
     * Shows the delete confirmation modal.
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
        return view('livewire.propostas', [
            'data' => $this->read(),
        ]);
    }

}
    
