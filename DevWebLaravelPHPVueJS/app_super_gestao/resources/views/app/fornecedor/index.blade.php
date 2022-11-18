<h1>Fornecedor</h1>
<hr><hr>

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
    <h1>While</h1>
        @while(isset($fornecedores[$i]))
            Fornecedor: {{ $fornecedores[$i]['nome'] }}
            <br>
            Status: {{ $fornecedores[$i]['status'] }}
            <br>
            CNPJ: {{ $fornecedores[$i]['cnpj'] ?? 'Dado não preenchido' }}
            <br>
            Telefone Celular: ({{ $fornecedores[$i]['ddd'] ?? 'ddd não informado!' }})
             {{ $fornecedores[$i]['telCelular'] ?? 'ddd não informado!' }}            
            @php $i++ @endphp
        @endwhile
        <hr><hr>
        <h1>foreach</h1>

        @foreach ($fornecedores as $indices => $fornecedor)
            @if($loop->first)
                Primeiro registro da interação.<br>
            @endif
            @if($loop->last)
                Ultimo registro da interação.<br>
                Quantidade de Fornecedores: {{ $loop->count }}<br>
            @endif
            Iteração Atual blade: {{ $loop->iteration; }}
            <br>
            Fornecedor: {{ $fornecedor['nome'] }}
            <br>
            Status: {{ $fornecedor['status'] }}
            <br>
            CNPJ: {{ $fornecedor['cnpj'] ?? 'Dado não preenchido' }}
            <br>
            Telefone Celular: ({{ $fornecedor['ddd'] ?? 'ddd não informado!' }})
             {{ $fornecedor['telCelular'] ?? 'ddd não informado!' }}            
        @endforeach
        <hr><hr>
        <h1>forelse</h1>

        @forelse ($fornecedores as $indices => $fornecedor)
            Fornecedor: {{ $fornecedor['nome'] }}
            <br>
            Status: {{ $fornecedor['status'] }}
            <br>
            CNPJ: {{ $fornecedor['cnpj'] ?? 'Dado não preenchido' }}
            <br>
            Telefone Celular: ({{ $fornecedor['ddd'] ?? 'ddd não informado!' }})
             {{ $fornecedor['telCelular'] ?? 'ddd não informado!' }}
            @empty
                sem fornecedores cadastrados!!!
        @endforelse
        <hr><hr>
    @endisset
