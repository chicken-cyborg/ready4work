<?php
namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Student;

class Crud extends Component
{
    public $students, $name, $email,$proposta, $mobile, $student_id;
    public $isModalOpen = 0;
    
    public function render()
    {
        $this->students = Student::all();
        return view('livewire.crud');
       
    }
    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }
    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }
    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }
    private function resetCreateForm(){
        $this->name = '';
        $this->email = '';
        $this->proposta = '';
        $this->mobile = ''; 
    }
    
    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'proposta' => 'required',
            'mobile' => 'required',
        ]);
    
        Student::updateOrCreate(['id' => $this->student_id], [
            'name' => $this->name,
            'email' => $this->email,
            'proposta' => $this->proposta,
            'mobile' => $this->mobile,
        ]);
        session()->flash('Mensagem', $this->student_id ? 'Modificações no estudante aplicadas.' : 'Estudante criado.');
        $this->closeModalPopover();
        $this->resetCreateForm();
       
    }
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $this->student_id = $id;
        $this->name = $student->name;
        $this->email = $student->email;
        $this->proposta = $student->proposta;
        $this->mobile = $student->mobile;
    
        $this->openModalPopover();
    }
     
    public function delete($id)
    {
        Student::find($id)->delete();
        session()->flash('Mensagem', 'Estudante eliminado.');
        
    }

    
}