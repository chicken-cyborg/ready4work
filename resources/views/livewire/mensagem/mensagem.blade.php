<div>

    <div class="max-w-3xl mx-auto bg-white rounded-lg overflow-hidden  px-6 py-4">
        <div class="flex flex-col items-center">
          <h2 class="text-2xl font-bold mb-6"> Enviar mensagem</h2>
        </div>

        <div class="mt-4">
            <x-jet-label for="mensagem" value="{{ __('Mensagem') }}" />
            <textarea wire:model.defer="mensagem" id="" class="block mt-1 w-full"> </textarea>
            @error('mensagem') <span class="error">{{ $message }}</span> @enderror
        </div>  

        <x-jet-button class=" mt-2" wire:click="create()" wire:loading.attr="disabled">
            {{ __('Enviar') }}
        </x-jet-danger-button>
      </div>
    
</div>
