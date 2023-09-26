{{$slot}}
<form action="{{ route('site.contato')}}" method="POST">
    @csrf
    <input name='nome' value='{{ old('nome')}}' type="text" placeholder="Nome" class="borda-preta">
    {{ $errors->has('nome') ? $errors->first('nome') : ''}}
    <br>
    
    <input name='telefone' value='{{ old('telefone')}}' type="text" placeholder="Telefone" class="borda-preta">
    {{ $errors->has('telefone') ? $errors->first('telefone') : ''}}
     <br>
    
    <input name='email' value='{{ old('email')}}'  type="text" placeholder="E-mail" class="borda-preta">
    {{ $errors->has('email') ? $errors->first('email') : ''}}
    
    <select name="motivo_contato_id" class="borda_preta">
        <option value="">Qual o motivo do contato</option>
        
        @foreach($motivo_contatos as $key => $value){
            
            <option value="{{$value->id}}" {{old('motivo_contato_id') == $value->id ? 'selected': ''}}>{{$value->motivo_contato}}</option>
            }
        @endforeach 
    </select>
    {{ $errors->has('motivo_contato_id') ? $errors->first('motivo_contato_id') : ''}}
    <br>
    
    <textarea name='mensagem' class="borda-preta">{{ old('mensagem') != ''? old('mensagem'):'escreva sua mensagem aqui'}}
    </textarea>
    {{ $errors->has('mensagem') ? $errors->first('mensagem') : ''}}
    <br>
    <button type="submit" class="borda-preta">ENVIAR</button>
</form>