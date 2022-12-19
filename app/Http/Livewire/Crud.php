<?php
namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;
class Crud extends Component
{
    
    
    use WithPagination;

    public $modalFormVisible;
    public $modalConfirmDeleteVisible;

    public $modelId;

    /**
     * Meter as variaveis aqui
     */
    public  $name, $email,$proposta, $mobile;
    /**
     * As regras de validação
     *
     * @return void
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'proposta' => 'required',
            'email' => 'required',

        ];


    }

    /**
     * Carrega os dados do modelo.
     *
     * @return void
     */
    public function loadModel()
    {
        $data = Student::find($this->modelId);
        // Designa as variaveis que queres inserir na base de dados.
        $this->name = $data->name;
        $this->email = $data->email;
        $this->proposta = $data->proposta;
        $this->mobile = $data->mobile;


    }

    /**
     * The data for the model mapped
     * in this component.
     *
     * @return void
     */
    public function modelData()
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'proposta' => $this->proposta,
            'mobile' => $this->mobile,
        ];




    }

    /**
     * The create function.
     *
     * @return void
     */
    public function create()
    {
        $this->validate();
        Student::create($this->modelData());
        $this->modalFormVisible = false;
        $this->reset();
    }

    /**
     * The read function.
     *
     * @return void
     */
    public function read()
    {
        return Student::paginate(5);
    }

    /**
     * The update function
     *
     * @return void
     */
    public function update()
    {
        $this->validate();
        Student::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;
    }

    /**
     * The delete function.
     *
     * @return void
     */
    public function delete()
    {
        Student::destroy($this->modelId);
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
        $this->reset();
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
        return view('livewire.crud', [
            'data' => $this->read(),
        ]);
    }

}
    
