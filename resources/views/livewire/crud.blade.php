<div>   
    
    <x-jet-button wire:click="createShowModal()">
                    Criar
                </x-jet-button>
    <div class="flex flex-col">
    
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

            
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Proposta</th>
                
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">                         
                            @if ($data->count())
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="px-6 py-2">{{ $item->name }}</td>
                                        <td class="px-6 py-2">{{ $item->email }}</td>
                                        <td class="px-6 py-2">{{ $item->proposta }}</td>      
                                              
                                         @if(Auth::user()->role == 'admin')                                
                                        <td class="px-6 py-2 flex justify-end">
                                            <x-jet-button wire:click="updateShowModal({{ $item->id }})">
                                                Editar
                                            </x-jet-button> 
                                            <x-jet-danger-button class="ml-2" wire:click="deleteShowModal({{ $item->id }})">
                                                Eliminar
                                            </x-jet-button>
                                        </td>
                                        @endif
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
   
    <div class="mt-5">
    {{ $data->links() }}
    </div>

    {{-- Formulario --}}
    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('Editar proposta') }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="name" value="{{ __('Nome') }}" />
                <x-jet-input wire:model="name" id="" class="block mt-1 w-full" type="text" />
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input wire:model="email" id="" class="block mt-1 w-full" type="text" />
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="proposta" value="{{ __('Proposta') }}" />
                <x-jet-input wire:model="proposta" id="" class="block mt-1 w-full" type="text" />
                @error('proposta') <span class="error">{{ $message }}</span> @enderror
            </div>  

            <div class="mt-4">
                <x-jet-label for="mobile" value="{{ __('Telefone') }}" />
                <x-jet-input wire:model="mobile" id="" class="block mt-1 w-full" type="text" />
                @error('mobile') <span class="error">{{ $message }}</span> @enderror
            </div>  

                 
                  
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-jet-secondary-button>

            @if ($modelId)
                <x-jet-button class="ml-2" wire:click="update()" wire:loading.attr="disabled">
                    {{ __('Update') }}
                </x-jet-danger-button>  
            @else   
                <x-jet-button class="ml-2" wire:click="create()" wire:loading.attr="disabled">
                    {{ __('Create') }}
                </x-jet-danger-button>
            @endif            
        </x-slot>
    </x-jet-dialog-modal>

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