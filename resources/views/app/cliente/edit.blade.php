@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class='conteudo-pagina'>
          
          <div class='titulo-pagina-2'>
                <p>Ciar Novo Cliente</p>
          </div>

          <div class='menu'>
                <ul>
                    <li><a href="{{ route('cliente.index')}}">Voltar</a></li>
                    <li><a href="">Consultar</a></li>
                </ul>
          </div>
          
          <div class='informacao-pagina'>
             
             <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @component('app.cliente._components.form_create_edit')
                    
                @endcomponent
            </div>

            </div>
         
          </div>
    </div>
@endsection('conteudo')