    @if( isset($ProdutoDetalhe->id))
        <form action="{{ route('produto-detalhe.update', $ProdutoDetalhe->id) }}" method="POST">
            @csrf
            @method('PUT')
   
    @else
        <form action="{{ route('produto-detalhe.store') }}" method="POST">
            @csrf
   
    @endif
       
        <input type="text" name="produto_id" value="{{ $ProdutoDetalhe->produto_id ?? old('produto_id') }}" placeholder="ID do Produto" class="borda-preta">
        {{ $errors->has('produto_id') ? $errors->first('produto_id') : ''}}
        
        <input type="text" name="comprimento"  value="{{ $ProdutoDetalhe->comprimento ?? old('comprimento') }}" placeholder="Comprimento do Produto" class="borda-preta">
        {{ $errors->has('descicao') ? $errors->first('descicao') : ''}}

        <input type="number" name="largura"  value="{{  $ProdutoDetalhe->largura ?? old('largura') }}" placeholder="largura" class="borda-preta">
        {{ $errors->has('largura') ? $errors->first('largura') : ''}}
        
        
        <input type="number" name="altura"  value="{{  $ProdutoDetalhe->altura?? old('altura') }}" placeholder="altura" class="borda-preta">
        {{ $errors->has('altura') ? $errors->first('altura') : ''}}
        
        <select name="unidade_id" >
            <option > --Selecione a Unidade de Medida--</option>
            @foreach($unidades as $unidade)
            
            <option value="{{$unidade->id}}" {{ ( $Produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : ''}}>{{$unidade->descricao}}</option>
            
            @endforeach
            </select>
                {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}
        
        
        <button type="submit" class="borda-preta">Cadastrar</button>
</form>