<div>
    {{-- Formulario --}}
    <x-jet-dialog-modal wire:model="teste">
        <x-slot name="title">
            {{ __('Editar proposta') }}
        </x-slot>

        <x-slot name="content">
           

            

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
            <x-jet-secondary-button wire:click="closemodal()" wire:loading.attr="disabled">
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
</div>
