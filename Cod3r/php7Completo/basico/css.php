<div class="titulo">Integração HTML</div>

<H1>
    <?php 
        echo 'Olá';
        echo '<small>';
        echo ' Mundo!'; 
        echo '</small>';
    ?>
</H1>

<div center><button azul_background><?= "teste"?></button></div>

<h2 azul dobro>teste 2</h2>

<?= '<div center dobro>teste</div>' ?>

<style>
    button {
        padding: 5px <?= 2*30?>px ;
        /* background-color: #4286f4; */
        color: #eee;
        font-weight: bold;
        border-radius: 10px;
    }

    [center] {
        display: flex;
        justify-content: center;
    }

    [azul_background] {
        background-color: #4286f4;
    }

    [azul_font] {
        color: #4286f4;
    }

    [dobro] {
        font-size: 2rem;
    }
</style>



