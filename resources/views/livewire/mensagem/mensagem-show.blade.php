<div>
  
 
  
    @foreach ($propostas as $item)
    @foreach ($item->mensagens as $m)
    
       
  
    <div class="bg-gray-200 rounded-lg p-4 flex items-center mt-2">
      <div class="mr-4  ">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-circle" width="52" height="52" viewBox="0 0 24 24" stroke-width="1" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <circle cx="12" cy="12" r="9" />
          <line x1="12" y1="8" x2="12" y2="12" />
          <line x1="12" y1="16" x2="12.01" y2="16" />
        </svg>
      </div>
      <span class="text-gray-700 mr-4">
        <i class="fa fa-info-circle"></i>
      </span>
      <button class="text-gray-700 hover:text-gray-900 font-semibold" wire:click="modalVisible({{ $m->id }})">
        <p class="text-left"> Enviado por: {{$m->User->name}}</p> Referente a proposta: {{$item->proposta}} 
      </button>
      <div class="ml-auto mr-4">
        <x-jet-danger-button wire:click="deleteShowModal({{ $m->id }})">
          Eliminar
        </x-jet-danger-button>
      </div>
    </div>
    
      
        



      
          
     
      <div>
        {{-- Formulario --}}
        <x-jet-dialog-modal wire:model="modalFormVisible">
         
            <x-slot name="title"> 
                
            </x-slot>
          
            <x-slot name="content">
               
              
                  
              
    
              <div class="max-w-3xl mx-auto bg-white rounded-lg overflow-hidden  px-6 py-4">
                <div class="flex flex-col items-center">
                  <h2 class="text-2xl font-bold mb-6">{{$m->User->name}}</h2>
                  <p class="text-gray-700 text-base mb-4">
                    {{$m->mensagem}}
                  </p>
                  

                  <div>
                    Contato:
                    {{$m->User->telefone}}
                  </div>
                  
                </div>
              </div>
             
    
                 
    
                     
                      
            </x-slot>
    
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="closemodal()" wire:loading.attr="disabled">
                    {{ __('Fechar') }}
                </x-jet-secondary-button>
         
            </x-slot>
        </x-jet-dialog-modal>
    </div>
    



     {{-- The Delete Modal --}}
     <x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
      <x-slot name="title">
          {{ __('Eliminar mensagem') }}
      </x-slot>

      <x-slot name="content">
          {{ __('Dejesa elimanar a mensagem enviada por:   ')}} {{$m->User->name}}
      </x-slot>

      <x-slot name="footer">
          <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
              {{ __('Não') }}
          </x-jet-secondary-button>

          <x-jet-danger-button class="ml-2" wire:click="delete()" wire:loading.attr="disabled">
              {{ __('Sim') }}
          </x-jet-danger-button>
      </x-slot>
  </x-jet-dialog-modal>


    
  
  @endforeach 
  @endforeach 
  

        
   

    




        
 
   
</div>
