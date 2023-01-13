<div>

    
    {{-- Formulario --}}
    <x-jet-dialog-modal wire:model="teste">
        <x-slot name="title">
            {{ __('Atualizar user') }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="name" value="{{ __('Novo nome do user') }}" />
                <x-jet-input wire:model="name" id="" class="block mt-1 w-full" type="text" />
                @error('name')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input wire:model="email" id="" class="block mt-1 w-full" type="email" />
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="roles" value="{{ __('Roles') }}" />
                <select wire:model="role" id=""
                    class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    @foreach (App\Models\User::userRoleList() as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach

                </select>
                @error('')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            @if (!$modelId)
            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input wire:model="password" id="" class="block mt-1 w-full" type="text" />
                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            
            @endif
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="closemodal()" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-jet-secondary-button>

           @if ($modelId)
                <x-jet-button class="ml-2" wire:click="update()" wire:loading.attr="disabled">
                    Guardar
                    </x-jet-danger-button>
                    @else
                    <x-jet-button class="ml-2" wire:click="create()" wire:loading.attr="disabled">
                        Criar
                        </x-jet-danger-button>
                        @endif
        </x-slot>
    </x-jet-dialog-modal>
</div>
