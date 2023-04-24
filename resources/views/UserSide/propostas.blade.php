<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Propostas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class=" max-w-6xl	 mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-50 overflow-hidden shadow-xl sm:rounded-lg min-w-0">
                @livewire('propostas')
            </div>
        </div>
    </div>
</x-app-layout>