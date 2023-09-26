@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    <div class='conteudo-pagina'>
          
          <div class='titulo-pagina-2'>
                <p>Listagem de Clientes</p>
          </div>

          <div class='menu'>
                <ul>
                     <li><a href="{{ route('cliente.create')}}">Novo</a></li>
                    <li><a href="">Consultar</a></li>
                </ul>
          </div>
          
          <div class='informacao-pagina'>
                  <div style="width: 90%; margin-left: auto; margin-right: auto;">
                  <table border="1" width='100%'>
                        <thead>
                              <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    
                              </tr>
                        </thead>   
                        <tbody>

                              @foreach ($clientes as $cliente)
                                    <tr>
                                          <td>{{$cliente->id}}</td>
                                          <td>{{$cliente->nome}}</td>
                                          <td><a href="{{ route('cliente.show', ['cliente' => $cliente->id]) }}">Visualizar</a></td>
                                          <td><a href="{{ route('cliente.edit', ['cliente' => $cliente->id])}}">Editar</a></td>
                                          <td>
                                          <form id="form_{{$cliente->id}}" action="{{ route('cliente.destroy', ['cliente' => $cliente->id])}} " method="post">
                                                @csrf
                                                @method('DELETE')
                                               
                                               <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()">Excluir</a>
                                    
                                          </form>
                                           </td>
                                               
                                    </tr>
                              
                        @endforeach
                        </tbody>
                  
                  </table>
                  </div>
         
         </div>
       {{ $clientes->appends($request)->links()}}
       <br>  
      Exibindo o total de {{ $clientes->total()}} CLientes
      <br>
     Produto de {{ $clientes->firstItem()}} a {{ $clientes->lastItem() }}

         
          </div>
    </div>
@endsection('conteudo')