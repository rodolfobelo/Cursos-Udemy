{{$slot}}

<form action={{ route('site.contato') }} method="post">
    @csrf
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="borda-preta">
    <br>
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="borda-preta">
    <br>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="borda-preta">
    <br>
    {{-- {{ print_r($mot_contatos) }} --}}
    <select name="motivo_contato" class="borda-preta">
        <option value="">Qual o motivo do contato?</option>

        @foreach ($mot_contatos as $key => $motivo_contato)
            <option value="{{ $key }}" {{ old('motivo_contato') == $key ? 'selected' : '' }}>{{ print_r($motivo_contato, true) }}</option>
        @endforeach

        {{-- <option value="1" {{ old('motivo_contato') == 1 ? 'selected' : '' }}>Dúvida</option>
        <option value="2" {{ old('motivo_contato') == 2 ? 'selected' : '' }}>Elogio</option>
        <option value="3" {{ old('motivo_contato') == 3 ? 'selected' : '' }}>Reclamação</option> --}}
    </select>
    <br>
    <textarea name="mensagem" value="{{ old('mensagem') }}" class="borda-preta" placeholder="Preencha aqui a sua mensagem"></textarea>
    <br>
    <button type="submit" class="borda-preta">ENVIAR</button>
</form>
