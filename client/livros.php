<?php

require_once __DIR__ . '/../database/connect.php';
require_once __DIR__ . '/../login/verefica_user.php';

$sql = "SELECT * FROM livros";
$resultado = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/style.css">

    <title>Biblioteca Virtual</title>

</head>
<body>
    <header>

        <h1>EntreCapítulos</h1>

        <p>Seu espaço para descobrir novos livros.</p>

    </header>
    <main>

        <h2>Vitrine de Livros</h2>


        <section class="livros">
            <?php
            while ($livro = $resultado->fetch(PDO::FETCH_ASSOC)) {
            ?>

                <div class="card-livro">

                    <h3>
                        <?php echo $livro['titulo']; ?>
                    </h3>

                    <p>
                        <strong>Autor:</strong>
                        <?php echo $livro['autor']; ?>
                    </p>

                    <p>
                        <strong>Gênero:</strong>
                        <?php echo $livro['genero']; ?>
                    </p>

                    <p>
                        <strong>Ano:</strong>
                        <?php echo $livro['ano']; ?>
                    </p>


                    <?php
                    if ($livro['quantidade'] > 0) {
                    ?>

                        <p class="disponivel">
                            <?php echo $livro['quantidade']; ?>
                            livro(s) disponível(is)
                        </p>

                        <a href="emprestimo.php?livro=<?php echo $livro['id']; ?>" class="botao">

                            Alugar Livro

                        </a>

                    <?php

                    } else {

                    ?>

                        <p class="indisponivel">

                            Indisponível

                        </p>

                    <?php

                    }

                    ?>

                </div>
            <?php

            }

            ?>


        </section>

        <br><br> 

         <div style="text-align: center; color: rgb(127, 174, 189);">
                    <a href="/projeto_integrador/index.php">Voltar</a>
        </div>

    </main>
</body>
</html>