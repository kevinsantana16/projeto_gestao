@extends('app.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
    <div class='conteudo-pagina'>
          
          <div class='titulo-pagina-2'>
                <p>Fornecedor - Listar</p>
          </div>

          <div class='menu'>
                <ul>
                    <li><a href="{{route('app.fornecedor.adicionar')}}">Novo</a></li>
                    <li><a href="{{route('app.fornecedor')}}">Consultar</a></li>
                </ul>
          </div>
          
          <div class='informacao-pagina'>
                  <div style="width: 90%;">
                  <table border="1" width='100%'>
                        <thead>
                              <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Site</th>
                                    <th>UF</th>
                                    <th>E-mail</th>
                                    <th></th>
                                    <th></th>
                              </tr>
                        </thead>   
                        <tbody>

                              @foreach ($fornecedores as $fornecedor)
                                    <tr>
                                          <td>{{ $fornecedor->id}}</td>
                                          <td>{{$fornecedor->nome}}</td>
                                          <td>{{$fornecedor->site}}</td>
                                          <td>{{$fornecedor->uf}}</td>
                                          <td>{{$fornecedor->email}}</td>
                                          <td><a href="{{ route('app.fornecedor.excluir', $fornecedor->id)}}">Excluir</a></td>
                                          <td><a href="{{ route('app.fornecedor.editar', $fornecedor->id)}}">Editar</a></td>
                              </tr>
                              <tr>
                                    <td colspan="6">
                                          <p>Lista de produtos</p>
                                          <table border="1" style="margin:20px;">
                                                <thead>
                                                      <tr>
                                                            <th>ID</th>
                                                            <th>Nome</th>\
                                                            <th>Descricao</th>  
                                                               
                                                      </tr>
                                                </thead>
                                                <tbody>
                                                       @foreach($fornecedor->items as $key => $item)
                                                       <tr>
                                                            <td>{{$item->id}}</td>
                                                            <td>{{$item->nome}}<td>
                                                             <th>Descricao</th>  
                                                            <td>{{$item->descricao}}</td>
                                                      </tr>
                                                @endforeach
                                                </tbody>
                                          </table>
                                    </td>
                              </tr>
                              @endforeach
            
                        </tbody>
                  
                  </table>
                  </div>
         
         </div>
       {{ $fornecedores->appends($request)->links()}}
         
      Exibindo o total de {{ $fornecedores->total()}} fornecedores
      <br>
      Fornecedores de {{ $fornecedores->firstItem()}} a {{ $fornecedores->lastItem() }}

         
          </div>
    </div>
@endsection('conteudo')