<?php

// Inicia a sessão para acessar os dados do administrador.
session_start();

// Importa o arquivo responsável pela conexão com o banco de dados.
require_once __DIR__ . '/../database/connect.php';

// Verifica se existe um administrador logado.
if (!isset($_SESSION['admin_id'])) {

    // Se não estiver logado, redireciona para o login.
    header("Location: /projeto_integrador/login/login.php");

    // Interrompe a execução do código.
    exit;
}


// Cria o comando SQL para buscar todos os livros.
// ORDER BY id organiza os livros pelo ID.
$sql = "SELECT * FROM livros ORDER BY id";

// Executa a consulta e guarda os resultados.
$resultado = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/projeto_integrador/style/style.css">
    <title>Painel do Administrador</title>

</head>
<body>

    <!-- Cabeçalho da página. -->
    <header>

        <!-- Nome da biblioteca. -->
        <h1>EntreCapítulos</h1>

        <!-- Identifica a área administrativa. -->
        <p>Área do Administrador</p>

    </header>

    <main>

        <!-- Área principal do painel do administrador. -->
        <div class="painel-admin">

            <!-- Título do painel. -->
            <h2>Painel do Administrador</h2>

            <!-- Mostra o nome do administrador que está logado. -->
            <p>
                Olá, <?php echo $_SESSION['admin_nome']; ?>!
            </p>

            <!-- Link para cadastrar um novo livro. -->
            <a href="cadastrar_livro.php" class="botao-admin">
                Cadastrar Novo Livro
            </a>

            <!-- Botão para abrir a página do relatório. -->
            <a href="relatorio.php" class="botao-admin">
                Consultar Relatório
            </a>

            <!-- Seção onde os livros cadastrados serão exibidos. -->
            <section class="admin-livros">

                <?php

                // Enquanto houver livros, pega um por vez.
                // FETCH_ASSOC organiza os dados pelo nome das colunas.
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

                        <!-- Mostra o ano de publicação. -->
                        <p>
                            <strong>Ano:</strong>
                            <?php echo $livro['ano']; ?>
                        </p>

                        <!-- Mostra a quantidade disponível. -->
                        <p>
                            <strong>Quantidade:</strong>
                            <?php echo $livro['quantidade']; ?>
                        </p>

                        <!-- Área dos botões de edição e exclusão. -->
                        <div class="botoes-admin">

                            <!-- Envia o ID do livro para a página de edição. -->
                            <a
                                href="editar_livro.php?id=<?php echo $livro['id']; ?>"
                                class="botao-editar">
                                Editar
                            </a>

                            <!-- Envia o ID do livro para a página de exclusão. -->
                            <a
                                href="excluir_livro.php?id=<?php echo $livro['id']; ?>"
                                class="botao-excluir"
                                onclick="return confirm('Tem certeza que deseja excluir este livro?');">
                                Excluir
                            </a>
                        </div>
                    </div>

                <?php

                // Fecha o while.
                // Quando não houver mais livros, o loop termina.
                }

                ?>

            </section>

            <br>

            <!-- Link para voltar à página inicial. -->
            <a href="/projeto_integrador/index.php" class="voltar">
                Voltar
            </a>

        </div>

    </main>
</body>
</html>
