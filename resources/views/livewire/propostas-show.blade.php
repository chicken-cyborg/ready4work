<div>
    <div class=" grid grid-cols-3 gap-2 ">
      
      

      @foreach ($data as $item)
      
     
      <livewire:p-show :item="$item" key="{{$item->id}}"/>        

        @endforeach
    </div>  
    
    

    <div class="flex flex-col justify-center items-center">
      
      <button wire:click="load" type="button" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 mt-4 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-800">Ver mais</button>

    </div>
    
    
</div>
