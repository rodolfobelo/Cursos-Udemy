<h1>Fornecedor</h1>

@php
    /*
    if(empty($variavel)) {} //retornar true se a variável estiver vazia
    - ''
    - 0
    - 0.0
    - '0'
    - null
    - false
    - array()
    - $var
    
    $posicao = 1;*/
@endphp
    @isset($fornecedores)
    @php $i = 0 @endphp
        @while(isset($fornecedores[$i]))
            Fornecedor: {{ $fornecedores[$i]['nome'] }}
            <br>
            Status: {{ $fornecedores[$i]['status'] }}
            <br>
            CNPJ: {{ $fornecedores[$i]['cnpj'] ?? 'Dado não preenchido' }}
            <br>
            Telefone Celular: ({{ $fornecedores[$i]['ddd'] ?? 'ddd não informado!' }})
             {{ $fornecedores[$i]['telCelular'] ?? 'ddd não informado!' }}
            <hr>
            @php $i++ @endphp
        @endwhile
    @endisset
