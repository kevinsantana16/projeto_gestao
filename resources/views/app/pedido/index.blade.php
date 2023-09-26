@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')
    <div class='conteudo-pagina'>
          
          <div class='titulo-pagina-2'>
                <p>LIstagem de Pedidos</p>
          </div>

          <div class='menu'>
                <ul>
                     <li><a href="{{ route('pedido.create')}}">Novo</a></li>
                    <li><a href="">Consultar</a></li>
                </ul>
          </div>
          
          <div class='informacao-pagina'>
                  <div style="width: 90%; margin-left: auto; margin-right: auto;">
                  <table border="1" width='100%'>
                        <thead>
                              <tr>
                                    <th>ID Pedido</th>
                                    <th>Cliente</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    
                              </tr>
                        </thead>   
                        <tbody>

                              @foreach ($pedidos as $pedido)
                                    <tr>
                                          <td>{{$pedido->id}}</td>
                                          <td>{{$pedido->cliente_id}}</td>
                                          <td><a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id])}}">Adicionar produtos</a></td>
                                          <td><a href="{{ route('pedido.show', ['pedido' => $pedido->id]) }}">Visualizar</a></td>
                                          <td><a href="{{ route('pedido.edit', ['pedido' => $pedido->id])}}">Editar</a></td>
                                          <td>
                                          <form id="form_{{$pedido->id}}" action="{{ route('pedido.destroy', ['pedido' => $pedido->id])}} " method="post">
                                                @csrf
                                                @method('DELETE')
                                               
                                               <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()">Excluir</a>
                                    
                                          </form>
                                           </td>
                                               
                                    </tr>
                              
                        @endforeach
                        </tbody>
                  
                  </table>
                  </div>
         
         </div>
       {{ $pedidos->appends($request)->links()}}
       <br>  
      Exibindo o total de {{ $pedidos->total()}} Pedidos
      <br>
     Pedidos de {{ $pedidos->firstItem()}} a {{ $pedidos->lastItem() }}

         
          </div>
    </div>
@endsection('conteudo')