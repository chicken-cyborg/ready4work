<div>
    <div class="flex justify-between items-center space-x-4">
      @foreach ($data as $item)
        <div class="bg-white rounded-lg shadow-md p-6 w-90 H-40 flex-1">
          <h2 class="text-xl font-bold mb-4">{{ $item->name }}</h2>
          <p class="text-gray-700 mb-4">{{$item->proposta}}</p>
          <button class="bg-blue-500 text-white rounded-lg px-4 py-2 text-lg">Saber mais</button>
        </div>
        @endforeach
    </div>  
    
    

    <div class="flex justify-between items-center space-x-4">
       
    <div>
      <button wire:click="previousPage" wire:loading.attr="disabled" rel="next" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
      {!! __('pagination.previous') !!}
      </button>
    </div>

    <div>
      <button wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
      {!! __('pagination.next') !!}
      </button>
    </div>

    </div>
    
    
</div>
