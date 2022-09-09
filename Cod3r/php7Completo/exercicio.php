<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <link rel='stylesheet' type='text/css' media='screen' href='recursos/css/estilo.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='recursos/css/exercicio.css'>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <script src='main.js'></script>

    <title>Exercício</title>
</head>

<body class="exercicio">
    <header class="cabecalho">
        <h1>PHP</h1>
        <h2>Visualização de Exercícios</h2>
    </header>

    <nav class="navegacao">
        <a href=<?= "/{$_GET['dir']}/{$_GET['file']}.php" ?> class="verde">Sem Formatação</a>
        <a href="../index.php" class="vermelho">Voltar</a>
    </nav>


    <main class="principal">
        <div class="conteudo">
            <?php
            include(__DIR__ . "/{$_GET['dir']}/{$_GET['file']}.php");
            ?>
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