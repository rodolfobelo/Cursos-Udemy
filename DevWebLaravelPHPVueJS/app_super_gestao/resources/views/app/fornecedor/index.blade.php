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
        @for($i = 0; isset($fornecedores[$i]);$i++)
            Fornecedor: {{ $fornecedores[$i]['nome'] }}
            <br>
            Status: {{ $fornecedores[$i]['status'] }}
            <br>
            CNPJ: {{ $fornecedores[$i]['cnpj'] ?? 'Dado não preenchido' }}
            <br>
            Telefone Celular: ({{ $fornecedores[$i]['ddd'] ?? 'ddd não informado!' }})
             {{ $fornecedores[$i]['telCelular'] ?? 'ddd não informado!' }}
            <hr>
        @endfor    
    @endisset
