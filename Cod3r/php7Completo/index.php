<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <link rel='stylesheet' type='text/css' media='screen' href='recursos/css/estilo.css'>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <script src='main.js'></script>

    <title>PHP-7-Completo</title>
</head>

<body>
    <header class="cabecalho">
        <h1>PHP</h1>
        <h2>Índice de Exercícios</h2>
    </header>

    <main class="principal">
        <div class="conteudo">
            <nav class="modulos">
                <div class="modulo verde">
                    <h3>Básico</h3>
                    <ul>
                        <li><a href="exercicio.php?dir=basico&file=ola">Olá PHP.</a></li>
                        <li><a href="exercicio.php?dir=basico&file=html">Integração HTML.</a></li>
                        <li><a href="exercicio.php?dir=basico&file=css">Integração CSS.</a></li>
                        <li><a href="exercicio.php?dir=basico&file=desafio">Desafio.</a></li>
                    </ul>
                </div>                
                <div class="modulo vermelho">
                    <h3>Tipos</h3>
                    <ul>
                        <li><a href="exercicio.php?dir=tipos&file=int">Tipo Inteiro.</a></li>
                        <li><a href="exercicio.php?dir=tipos&file=float">Tipo Float.</a></li>
                        <li><a href="exercicio.php?dir=tipos&file=aritmetica">Op. Aritméticos.</a></li>
                        <li><a href="exercicio.php?dir=tipos&file=desafio">Desafio.</a></li>
                        <li><a href="exercicio.php?dir=tipos&file=string">Tipo String.</a></li>
                        <li><a href="exercicio.php?dir=tipos&file=desafio_string">Desafio String.</a></li>
                        <li><a href="exercicio.php?dir=tipos&file=booleano">Tipo Booleano.</a></li>
                        <li><a href="exercicio.php?dir=tipos&file=conversoes">Conversões.</a></li>
                    </ul>
                </div>
                <div class="modulo azul">
                    <h3>Variáveis</h3>
                    <ul>
                        <li><a href="exercicio.php?dir=variaveis&file=basico">Variáveis.</a></li>
                        <li><a href="exercicio.php?dir=variaveis&file=desafio">Desafio.</a></li>
                        <li><a href="exercicio.php?dir=variaveis&file=atribuicoes">Atribuições.</a></li>
                        <li><a href="exercicio.php?dir=variaveis&file=Interpolacao">Interpolação.</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </main>

    <!-- <main class="dados"></main> -->

    <footer class="rodape">
        COD3R & ALUNOS <?php
                        $Year = date("Y");
                        echo $Year;
                        ?>
    </footer>
</body>
</html>