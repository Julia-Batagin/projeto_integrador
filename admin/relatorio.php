<?php

// Inicia a sessão.
session_start();

// Conecta ao banco de dados.
require_once __DIR__ . '/../database/connect.php';

// Verifica se o administrador está logado.
if (!isset($_SESSION['admin_id'])) {
    header("Location: /projeto_integrador/login/login.php");
    exit;
}

// Busca os aluguéis, os usuários e os livros.
//$sql é uma variável PHP que guarda o comando SQL que será enviado ao banco de dados.
//SELECT é o comando usado para consultar informações no banco.
//Usamos AS nome_usuario para criar um nome alternativo no resultado da consulta.
//INNER JOIN usuarios: junta os registros com a tabela usuarios.
//ON: define a condição que o banco deve usar para fazer essa ligação.
$sql = "SELECT
            usuarios.nome AS nome_usuario,
            usuarios.email,
            livros.titulo AS titulo_livro,
            emprestimos.data_emprestimo,
            emprestimos.data_devolucao
        FROM emprestimos
        INNER JOIN usuarios
            ON emprestimos.usuario_id = usuarios.id
        INNER JOIN livros
            ON emprestimos.livro_id = livros.id
        ORDER BY emprestimos.id DESC";

// Executa a consulta.
$resultado = $conexao->query($sql);

?>

```html
<!DOCTYPE html>
<!-- Informa ao navegador que estamos usando HTML5. -->

<html lang="pt-br">
<!-- Define o idioma da página como português brasileiro. -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/projeto_integrador/style/style.css">

    <title>Relatório de Empréstimos</title>
    <!-- Define o título que aparece na aba do navegador. -->

</head>
<body>
<!-- Inicia o conteúdo visível da página. -->

    <header>
        <!-- Cria o cabeçalho da página. -->

        <h1>EntreCapítulos</h1>
        <!-- Mostra o nome da biblioteca. -->

        <p>Relatório de Empréstimos</p>
        <!-- Informa que esta página apresenta o relatório de empréstimos. -->

    </header>
    <!-- Encerra o cabeçalho. -->

    <main>
        <!-- Indica a área principal do conteúdo. -->

        <div class="relatorio">
            <!-- Cria uma caixa que será estilizada pelo CSS. -->

            <h2>Livros Alugados</h2>
            <!-- Exibe o título da seção que apresenta os empréstimos. -->

            <?php
            // Verifica se a consulta encontrou algum empréstimo.
            //Row count (ou contagem de linhas) é a quantidade total de registros (linhas) presentes em uma tabela de banco de dados, planilha ou conjunto de dados.
            if ($resultado->rowCount() > 0) {
            ?>

                <?php
                // Percorre os resultados da consulta, um empréstimo por vez.
                // FETCH_ASSOC organiza os dados pelo nome das colunas.
                while ($emprestimo = $resultado->fetch(PDO::FETCH_ASSOC)) {
                ?>

                    <div class="resultado-relatorio">
                        <!-- Cria um cartão para mostrar os dados de um empréstimo. -->

                        <p>
                            <!-- Exibe o nome do usuário. -->

                            <strong>Usuário:</strong>

                            <?php
                            // Mostra o nome do usuário.
                            // htmlspecialchars evita que o conteúdo seja interpretado como HTML.
                            echo htmlspecialchars($emprestimo['nome_usuario']);
                            ?>
                        </p>

                        <p>
                            <!-- Exibe o e-mail do usuário. -->

                            <strong>E-mail:</strong>

                            <?php
                            // Mostra o e-mail registrado no banco de dados.
                            echo htmlspecialchars($emprestimo['email']);
                            ?>
                        </p>

                        <p>
                            <!-- Exibe o título do livro alugado. -->

                            <strong>Livro:</strong>

                            <?php
                            // Mostra o título do livro.
                            echo htmlspecialchars($emprestimo['titulo_livro']);
                            ?>
                        </p>

                        <p>
                            <!-- Exibe a data em que o livro foi alugado. -->

                            <strong>Data do aluguel:</strong>

                            <?php
                            // Converte a data para o formato dia/mês/ano.
                            // strtotime transforma a data em um formato que date consegue interpretar.
                            // date('d/m/Y') apresenta a data no padrão brasileiro.
                            echo date('d/m/Y', strtotime($emprestimo['data_emprestimo']));
                            ?>
                        </p>

                        <p>
                            <!-- Exibe a data de devolução, se estiver registrada. -->

                            <strong>Data da devolução:</strong>

                            <?php

                            // Verifica se existe uma data de devolução.
                            if ($emprestimo['data_devolucao'] != null) {

                                // Se existir, mostra a data no formato dia/mês/ano.
                                echo date('d/m/Y', strtotime($emprestimo['data_devolucao']));

                            } else {

                                // Se estiver vazia, informa que o livro ainda não foi devolvido.
                                echo "Ainda não devolvido";

                            }

                            ?>

                        </p>

                    </div>
                    <!-- Encerra o cartão deste empréstimo. -->

                <?php
                // Encerra o while.
                // O código continua repetindo enquanto houver empréstimos.
                }
                ?>

            <?php
            // Caso a consulta não encontre empréstimos, executa o else.
            } else {
            ?>

                <p>Nenhum livro foi alugado ainda.</p>
                <!-- Mostra uma mensagem quando não existem empréstimos registrados. -->

            <?php
            // Encerra a condição if/else.
            }
            ?>

            <a href="painel.php" class="voltar">
                <!-- Cria um link para voltar ao painel do administrador. -->

                Voltar ao Painel

        </div>
    </main>
</body>
</html>

