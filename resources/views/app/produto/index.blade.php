@extends('app.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
    <div class='conteudo-pagina'>
          
          <div class='titulo-pagina-2'>
                <p>Produto - Listar</p>
          </div>

          <div class='menu'>
                <ul>
                     <li><a href="{{ route('produto.create')}}">Novo</a></li>
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
                                    <th>descricao</th>
                                    <th>fornecedor</th>
                                    <th>Peso</th>
                                    <th>Unidade ID</th>
                                    <th>Comprimento</th>
                                    <th>Altura</th>
                                    <th>Largura</th>
                                    <th>Visualizar</th>
                                    <th>Editar</th>
                                    <th>Excluir</th>
                              </tr>
                        </thead>   
                        <tbody>

                              @foreach ($produtos as $produto)
                                    <tr>
                                          <td>{{ $produto->id}}</td>
                                          <td>{{$produto->nome}}</td>
                                          <td>{{$produto->descricao}}</td>
                                          <td>{{$produto->fornecedor->nome}}</td>
                                          <td>{{$produto->peso}}</td>
                                          <td>{{$produto->unidade_id}}</td>
                                          <td>{{$produto->itemdetalhe->comprimento ?? ''}}</td>
                                          <td>{{$produto->itemdetalhe->altura ?? ''}}</td>
                                          <td>{{$produto->Itemdetalhe->largura ?? ''}}</td>
                                          <td><a href="{{ route('produto.show', ['produto' => $produto->id]) }}">Visualizar</a></td>
                                          <td><a href="{{ route('produto.edit', ['produto' => $produto->id])}}">Editar</a></td>
                                          <td>
                                          <form id="form_{{$produto->id}}" action="{{ route('produto.destroy', ['produto' => $produto->id])}} " method="post">
                                                @csrf
                                                @method('DELETE')
                                               
                                               <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>
                                    </form>
                                           </td>
                                    </tr>

                                    <tr>
                                          <td colspan="12">
                                               <p> Pedido(s) </p> 
                                                @foreach($produto->pedidos as $pedido)
                                                      <a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}">
                                                            Pedido: {{$pedido->id}},
                                                       </a>
                                                @endforeach
                                          </td>
                                    </tr>
                              
                        @endforeach
                        </tbody>
                  
                  </table>
                  </div>
         
         </div>
       {{ $produtos->appends($request)->links()}}
       <br>  
      Exibindo o total de {{ $produtos->total()}} Produtos
      <br>
     Produto de {{ $produtos->firstItem()}} a {{ $produtos->lastItem() }}

         
          </div>
    </div>
@endsection('conteudo')