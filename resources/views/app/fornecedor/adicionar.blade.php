@extends('app.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
    <div class='conteudo-pagina'>
          
          <div class='titulo-pagina-2'>
                <p>{{$titulo}}</p>
          </div>

          <div class='menu'>
                <ul>
                    <li><a href="{{route('app.fornecedor.adicionar')}}">Novo</a></li>
                    <li><a href="{{route('app.fornecedor')}}">Consultar</a></li>
                </ul>
          </div>
          
          <div class='informacao-pagina'>
             
             {{$msg ?? '' }}
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form action="{{ route('app.fornecedor.adicionar')}}" method="POST">
                  
                    <input type="hidden" name="id" value="{{$fornecedor_editar->id ?? ''}}">
                  @csrf
                    <input type="text" name="nome" value=" {{$fornecedor_editar->nome ?? old('nome')}}" placeholder="Nome" class="borda-preta">
                     {{ $errors->has('nome') ? $errors->first('nome') : ''}}
                    
                    <input type="text" name="site"  value=" {{$fornecedor_editar->site ?? old('site')}}" placeholder="Site" class="borda-preta">
                    {{ $errors->has('site') ? $errors->first('site') : ''}}
                   
                    <input type="text" name="uf"  value=" {{$fornecedor_editar->uf ?? old('uf')}}" placeholder="Uf" class="borda-preta">
                    {{ $errors->has('uf') ? $errors->first('uf') : ''}}
                    
                    <input type="text" name="email"  value=" {{$fornecedor_editar->email ?? old('email')}}" placeholder="Email" class="borda-preta">
                    {{ $errors->has('email') ? $errors->first('email') : ''}}
                    
                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
         
          </div>
    </div>
@endsection('conteudo')