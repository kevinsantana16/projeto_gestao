    @if( isset($produto->id))
        <form action="{{ route('produto.update', $produto->id) }}" method="POST">
            @csrf
            @method('PUT')
   
    @else
        <form action="{{ route('produto.store') }}" method="POST">
            @csrf
   
    @endif
       
        <select name="fornecedor_id" >
            <option >Fornecedores ID</option>
            
            @foreach($fornecedores as $fornecedor)
                <option value="{{ $fornecedor->id }}" {{ ( $produto->fornecedor_id ?? old('fornecedor_id')) == $fornecedor->id ? 'selected' : ''}}>{{$fornecedor->nome}}</option>
            @endforeach
        
        </select>
            {{ $errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : ''}}
       
        <input type="text" name="produto_nome" value="{{ $produto->nome ?? old('produto_nome') }}" placeholder="Nome do Produto" class="borda-preta">
        {{ $errors->has('produto_nome') ? $errors->first('produto_nome') : ''}}
        
        <input type="text" name="produto_descricao"  value="{{ $produto->descricao ?? old('produto_descrica') }}" placeholder="Descricao do Produto" class="borda-preta">
        {{ $errors->has('produto_descrica') ? $errors->first('comprimento') : ''}}

        <input type="number" name="produto_peso"  value="{{  $produto->peso ?? old('produto_pes') }}" placeholder="Peso" class="borda-preta">
        {{ $errors->has('produto_pes') ? $errors->first('produto_pes') : ''}}

        <select name="unidade_id" >
            <option > --Selecione a Unidade de Medida--</option>
            @foreach($unidades as $unidade)
            
            <option value="{{$unidade->id}}" {{ old('unidade_id') == $unidade->id ? 'selected' : ''}}>{{$unidade->descricao}}</option>
            
            @endforeach
            </select>
                {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}
       
        
        <button type="submit" class="borda-preta">Cadastrar</button>
</form>

