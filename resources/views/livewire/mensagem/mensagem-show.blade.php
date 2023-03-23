<div>
    

    <div class="bg-sky-300 w-full flex ">
        <div class="bg-amber-300 flex-none w-48 h-48  p-8 break-all">Aliabjsdjkasdnm abdkaskjdkmabsdjhkjçoçdaghdcahjvgjhdoipsjçk    </div>
        <div class="bg-blue-300 w-48 grow h-48  p-8 break-all rounded-br-xl	">Aliabjsdjkasdnm abdkaskjdkmabsdjhkjçoçdaghdcahjvgjhdoipsjçk    </div>
        
    </div>

@foreach ($propostas as $item)
    
    Proposta:{{$item->proposta}} <br>
    @foreach ($item->mensagens as $m)

    Mensagem:{{$m->mensagem}}
        
    @endforeach


@endforeach 



        
 
   
</div>
