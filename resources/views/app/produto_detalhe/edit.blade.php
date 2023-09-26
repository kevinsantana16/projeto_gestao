@extends('app.layouts.basico')

@section('titulo', 'Produto Detalhes - Edit')

@section('conteudo')
    <div class='conteudo-pagina'>
          
          <div class='titulo-pagina-2'>
                <p>Produto Editar</p>
          </div>

          <div class='menu'>
                <ul>
                    <li><a href="#"> Voltar</a></li>
                    
                </ul>
          </div>
          
          <div class='informacao-pagina'>
             <div><h4>Produto</h4></div>
             
             <div>Nome: {{$ProdutoDetalhe->item->nome}}</div>
             <div>descricao: {{$ProdutoDetalhe->item->descricao}}</div>
             <br>
            
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                
              @component('app.produto_detalhe._components.form_create_edit', [ 'ProdutoDetalhe' => $ProdutoDetalhe , 'unidades' => $unidades])
                    'ProdutoDetalhe' => $ProdutoDetalhe
             @endcomponent

            </div>

          </div>
    </div>
@endsection('conteudo')