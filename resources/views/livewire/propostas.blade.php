<div>   
    
    <x-jet-button wire:click="createShowModal()">
                    Criar
                </x-jet-button>
            
                
    <div class="flex flex-col">
    
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

            
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg min-w-full">
                
                    <table class="min-w-full divide-y divide-gray-200 ">
                        <thead>
                            <tr>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Proposta</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Telefone</th>
                                <th class="px-6 py-3 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Açoes</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 min-w-max">                         
                            @if ($data->count())
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="px-6 py-2">{{ $item->mobile }}</td>      
                                       <td class="px-6 py-2">{{ $item->proposta }}</td>      
                                              
                                                                         
                                        <td class="px-6 py-2 flex">
                                            <div class="flex justify-start">
                                            <x-jet-button wire:click="updateShowModal({{ $item->id }})">
                                                Editar
                                            </x-jet-button> 
                                            <x-jet-danger-button class="ml-2" wire:click="deleteShowModal({{ $item->id }})">
                                                Eliminar
                                            </x-jet-button>
                                            </div>
                                        </td>
                                       
                                    </tr>
                                @endforeach
                            @else 
                                <tr>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="4">Sem propostas</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   

    @if ($modalFormVisible)
    <div >
    <livewire:proposta-update :modelId="$modelId"  />
    </div>
    @endif
   

    

    {{-- The Delete Modal --}}
    <x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
        <x-slot name="title">
            {{ __('Delete Modal Title') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Certrza  que deseja apagar este registro?') }}
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
</div>