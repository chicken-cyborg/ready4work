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

    public  $name, $email,$proposta, $mobile, $estado, $role;

    
    public $per_page=6;
    


    public function load(){
        $this->per_page+=3; 
        
    }

    






    public function render()
    {
        if(Auth::user()->role == 'empresa'){
        return view('livewire.propostas-show', [
            'data' =>Proposta::whereEstado('aprovado')->whereRole('user')->paginate($this->per_page),
        ]);}

        if(Auth::user()->role == 'user'){
        return view('livewire.propostas-show', [
            'data' =>Proposta::whereEstado('aprovado')->whereRole('empresa')->paginate($this->per_page),
        ]);}


        if(Auth::user()->role == 'admin'){
            return view('livewire.propostas-show', [
                'data' =>Proposta::whereEstado('aprovado')->paginate($this->per_page),
            ]);}
    }
}
