     <div>    
     
          <div class="bg-gray-50 rounded-lg shadow-md p-6 w-90 H-40 flex-1 ">
            <h2 class="text-xl font-bold mb-4">{{ $item->name }}</h2>
            <p class="text-gray-700 mb-4">{{$item->proposta}}</p>
            <button class="bg-blue-600 text-white rounded-lg px-4 py-2 text-lg" wire:click="modalVisible">Saber mais</button>
          </div>
       
          <div> 
            {{-- Formulario --}}
            <x-jet-dialog-modal wire:model="modalFormVisible">
             
                <x-slot name="title"> 
                    
                </x-slot>
              
                <x-slot name="content">
                   
        
                  <div class="max-w-3xl mx-auto bg-white rounded-lg overflow-hidden  px-6 py-4">
                    <div class="flex flex-col items-center">
                      <h2 class="text-2xl font-bold mb-6">{{$item->name}}</h2>
                      <p class="text-gray-700 text-base mb-4">
                        {{$item->proposta}}
                      </p>
                      <p class="text-gray-700 text-base mb-4">
                        {{$item->mobile}}
                      </p>

                      
                      <button  wire:click="mensagem()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Contacte
                      </button>
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

        <div>

          <x-jet-dialog-modal wire:model="modalFormVisible2">
             
            <x-slot name="title">
             
                
            </x-slot>
          
            <x-slot name="content">
               
              <livewire:mensagens :proposta_id="$item->id" />

            </x-slot>
    
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="mensagemclose()" wire:loading.attr="disabled">
                    {{ __('Fechar') }}
                </x-jet-secondary-button>
         
            </x-slot>
        </x-jet-dialog-modal>

        </div>

     </div>