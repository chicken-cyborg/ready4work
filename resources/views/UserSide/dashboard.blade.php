<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Página inicial') }}
        </h2>
    </x-slot>
        
    <div class="py-12">
       
            
                

        <livewire:propostas-show />
              
              
            

        
    </div>
</x-app-layout>
