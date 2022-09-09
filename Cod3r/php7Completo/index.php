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
                <div class="modulo verde">
                    <h3>Tipos</h3>
                    <ul>
                        <li><a href="exercicio.php?dir=tipos&file=int">Tipo Inteiro.</a></li>
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