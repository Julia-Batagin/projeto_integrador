<?php

require_once __DIR__ . '/../database/connect.php';
require_once __DIR__ . '/../login/verefica_user.php';

// Cria o comando SQL para buscar todos os livros da tabela.
$sql = "SELECT * FROM livros";

// Executa a consulta no banco de dados e guarda o resultado.
$resultado = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/projeto_integrador/style/style.css">

    <!-- Define o título da aba do navegador. -->
    <title>Biblioteca Virtual</title>

</head>

<body>

    <!-- Cabeçalho do site. -->
    <header>

        <!-- Nome da biblioteca. -->
        <h1>EntreCapítulos</h1>

        <!-- Descrição do site. -->
        <p>Seu espaço para descobrir novos livros.</p>

    </header>

    <!-- Agrupa o conteúdo principal da página. -->
    <main>

        <!-- Título da seção de livros. -->
        <h2>Vitrine de Livros</h2>

        <!-- Agrupa os cards dos livros. -->
        <section class="livros">

            <?php
            // Percorre os livros encontrados no banco, pegando um livro por vez.
            // While: Enquanto estiver executando...
            while ($livro = $resultado->fetch(PDO::FETCH_ASSOC)) {

            ?>
                <!-- Card que apresenta as informações de um livro. -->
                <div class="card-livro">

                    <!-- Mostra o título do livro. -->
                    <h3>
                        <?php echo $livro['titulo']; ?>
                    </h3>

                    <!-- Mostra o autor do livro. -->
                    <p>
                        <strong>Autor:</strong>
                        <?php echo $livro['autor']; ?>
                    </p>

                    <!-- Mostra o gênero do livro. -->
                    <p>
                        <strong>Gênero:</strong>
                        <?php echo $livro['genero']; ?>
                    </p>

                    <!-- Mostra o ano de publicação. -->
                    <p>
                        <strong>Ano:</strong>
                        <?php echo $livro['ano']; ?>
                    </p>

                    <?php

                    // Verifica se existe pelo menos um exemplar disponível.
                    // If: se a quantidade for menor que 0
                    if ($livro['quantidade'] > 0) {

                    ?>

                        <!-- Mostra a quantidade disponível. -->
                        <p class="disponivel">
                            <?php echo $livro['quantidade']; ?>
                            livro(s) disponível(is)
                        </p>

                        <!-- Link para a página de empréstimo,
                        enviando o ID do livro pela URL. -->
                        <a href="emprestimo.php?livro=<?php echo $livro['id']; ?>" class="botao">
                            Alugar Livro
                        </a>

                    <?php
                    // Encerra o if e inicia o else, executando o código alternativo quando não há livros disponíveis.

                    } else {

                    ?>

                        <!-- Aparece quando a quantidade é zero. -->
                        <p class="indisponivel">
                            Indisponível
                        </p>

                    <?php
                    // Fecha o bloco if/else do PHP, encerrando a verificação da disponibilidade do livro.

                    }

                    ?>

                </div>

            <?php

            // Fecha o while e passa para o próximo livro.
            }

            ?>

        </section>

        <!-- Adiciona espaço entre os livros e o link de retorno. -->
        <br><br>

        <!-- Link para voltar à página inicial do projeto. -->
        <a href="/projeto_integrador/index.php" class="voltar">Voltar</a>

    </main>
</body>
</html>
