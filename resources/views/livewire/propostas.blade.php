<div  >
    <div class="flex -z-50">


        <div class="flex-grow pr-[500px] z-10">
            <form>
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white z-10">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none z-10">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400 z-10" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="search" id="default-search" wire:model="search"
                        class="z-10 block w-full	 p-4 pl-10  text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-gray-300 focus:border-gray-300 dark:bg-gray-200 dark:border-gray-200 dark:placeholder-gray-400 dark:text-gray-600 dark:focus:ring-grey-300 dark:focus:border-grey-300"
                        placeholder="Search Mockups, Logos..." required>
                </div>
            </form>

        </div>

        <button wire:click="createShowModal()" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-6 ">
            Criar
        </button>


    </div>
    

    <div class="flex flex-col">

        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">

            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">


                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg min-w-full">

                    <table class="min-w-full divide-y divide-gray-200 ">
                        <thead>
                            <tr>

    
                                
                                @if (Auth::user()->role == 'admin')
                                <th   class="flex flex-row" >
                                    <div >
                                    <a href="#"  wire:click="sortBy('name')">
                                        @if ($sortField === 'name')
                                            @if ($sortDirection === 'asc')
                                            
                                            
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-sort-ascending-letters mt-2 ml-1 " width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M15 10v-5c0 -1.38 .62 -2 2 -2s2 .62 2 2v5m0 -3h-4" />
                                            <path d="M19 21h-4l4 -7h-4" />
                                            <path d="M4 15l3 3l3 -3" />
                                            <path d="M7 6v12" />
                                          </svg>
                                         
                        
                                          @else
                                        
                                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-sort-descending-letters mt-2 ml-1" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M15 21v-5c0 -1.38 .62 -2 2 -2s2 .62 2 2v5m0 -3h-4" />
                                            <path d="M19 10h-4l4 -7h-4" />
                                            <path d="M4 15l3 3l3 -3" />
                                            <path d="M7 6v12" />
                                          </svg>
                                        
                                        
                                          @endif
                                          @endif
                                        
                                    </a>
                                    </div>
                                    <div>
                                    <p class="mr-6 ml-3 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Nome</p>
                                   </div>
                                </th> @endif
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Proposta</th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Telefone</th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Açoes</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 min-w-max">
                            @if ($data->count())
                                @foreach ($data as $item)
                                    <tr class="bg-gray-50">
                                        @if (Auth::user()->role == 'admin')
                                            <td class="px-6 py-2">{{ $item->name }}</td>
                                        @endif
                                        <td class="px-6 py-2">{{ $item->proposta }}</td>
                                        <td class="px-6 py-2">{{ $item->mobile }}</td>


                                        <td class="px-6 py-2 justify-center flex">
                                            <div class="flex justify-center">
                                                <x-jet-button wire:click="updateShowModal({{ $item->id }})">
                                                    Editar
                                                </x-jet-button>
                                                <x-jet-danger-button class="ml-2"
                                                    wire:click="deleteShowModal({{ $item->id }})">
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
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>


    @if ($modalFormVisible)
        <div>
            <livewire:proposta-update :modelId="$modelId" />
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
