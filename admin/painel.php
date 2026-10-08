<?php

session_start();

require_once __DIR__ . '/../database/connect.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: /login/login.php");
    exit;
}


// Cria o comando SQL para buscar todos os livros.
// ORDER BY id organiza os livros pelo ID.
$sql = "SELECT * FROM livros ORDER BY id";


// Executa a consulta no banco de dados.
// O resultado é armazenado na variável $resultado.
$resultado = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/style.css">

    <title>Painel do Administrador</title>

</head>
<body>
    <header>

        <h1>EntreCapítulos</h1>

        <p>
            Área do Administrador
        </p>

    </header>


   <main>

    <!-- Área principal do painel do administrador. -->
    <div class="painel-admin">


        <!-- Título do painel. -->
        <h2>Painel do Administrador</h2>


        <!--
            Mostra o nome do administrador que está logado.

            $_SESSION['admin_nome'] foi preenchido
            durante o login.
        -->
        <p>
          Olá, <?php echo $_SESSION['admin_nome']; ?>!
        </p>


        <!--
            Link para a página de cadastro de livros.
        -->
        <a href="cadastrar_livro.php" class="botao-admin">
            Cadastrar Novo Livro
        </a>


        <!--
            Seção onde os livros cadastrados
            serão mostrados.
        -->
        <section class="admin-livros">


            <?php

            // Enquanto houver livros no resultado, pega um livro por vez.
            // FETCH_ASSOC transforma os dados em um array usando o nome das colunas.
            while ($livro = $resultado->fetch(PDO::FETCH_ASSOC)) {

            ?>

                <!-- Card que representa um livro. -->
                <div class="card-admin">

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

                    <!-- Mostra o ano do livro. -->
                    <p>
                        <strong>Ano:</strong>
                        <?php echo $livro['ano']; ?>
                    </p>

                    <!-- Mostra a quantidade disponível. -->
                    <p>
                        <strong>Quantidade:</strong>
                        <?php echo $livro['quantidade']; ?>
                    </p>

                    <!--
                        Área que contém os botões
                        de editar e excluir.
                    -->
                    <div class="botoes-admin">

                        <!--
                            Link para editar o livro.
                            O ID do livro é enviado pela URL.
                        -->
                        <a href="editar_livro.php?id=<?php echo $livro['id']; ?>"
                            class="botao-editar">
                            Editar
                        </a>

                        <ah href="excluir_livro.php?id=<?php echo $livro['id']; ?>"
                            class="botao-excluir">
                            Excluir
                        </a>

                    </div>
                </div>

            <?php

            // Fecha o while.
            // Quando não houver mais livros,
            // o loop termina.
            }

            ?>

        </section>

        <br>


        <!-- Link para voltar para a página inicial. -->
        <a href="/projeto_integrador/index.php" class="voltar">
            Voltar
        </a>

    </div>
    </main>
</body>
</html>
