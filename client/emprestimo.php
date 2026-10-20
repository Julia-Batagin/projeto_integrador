<?php

require_once __DIR__ . '/../database/connect.php';
require_once __DIR__ . '/../login/verefica_user.php';

// Pega o ID do livro enviado pela URL.
$id_livro = $_GET['livro'];

// Busca todas as informações do livro que possui esse ID.
$sql = "SELECT * FROM livros WHERE id = :id";

$stmt = $conexao->prepare($sql);

// Executa a consulta usando o ID do livro.
$stmt->execute(['id' => $id_livro]);

// Guarda os dados encontrados na variável $livro.
$livro = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Importa o arquivo CSS para estilizar a página. -->
    <link rel="stylesheet" href="/style/style.css">

    <!-- Define o título da aba do navegador. -->
    <title>Termos de Empréstimo</title>

</head>

<body>

    <!-- Cabeçalho do site. -->
    <header>
        <h1>EntreCapítulos</h1>
        <p>Seu espaço para descobrir novos livros.</p>
    </header>

    <!-- Conteúdo principal da página. -->
    <main>

        <!-- Div que agrupa os termos de empréstimo. -->
        <div class="termos">

            <h2>TERMOS DE EMPRÉSTIMO</h2>

            <p>
                <!-- Mostra o título do livro buscado no banco. -->
                <strong>Livro:</strong>
                <?php echo $livro['titulo']; ?>
            </p>

            <p>
                <!-- Mostra o autor do livro. -->
                <strong>Autor:</strong>
                <?php echo $livro['autor']; ?>
            </p>

            <p>
                <!-- Informa o prazo para devolver o livro. -->
                <strong>Prazo de empréstimo:</strong>
                7 dias
            </p>

            <!-- Explica a obrigação de devolver no prazo. -->
            <p>
                O livro deverá ser devolvido dentro do prazo estabelecido.
            </p>

            <!-- Informa o valor da multa por atraso. -->
            <p>
                Caso o livro seja devolvido após o prazo,
                será aplicada uma multa de
                <strong>R$ 2,00 por dia de atraso.</strong>
            </p>

            <!-- Informa a responsabilidade em caso de perda ou dano. -->
            <p>
                Em caso de perda ou dano ao livro, o usuário poderá ser
                responsabilizado pela reposição do exemplar.
            </p>

            <!-- Cria um link estilizado como botão que leva à página confirmar_emprestimo.php, enviando o ID do livro pela URL para identificar qual livro será alugado. -->
             <!-- A função do PHP é executar códigos no servidor, permitindo conectar ao banco de dados, cadastrar usuários, consultar livros, atualizar quantidades e processar informações antes de exibi-las no site. -->
            <a href="confirmar_emprestimo.php?livro=<?php echo $livro['id']; ?>" class="botao"> Confirmar Empréstimo</a>

            <!-- Link para voltar à página de livros sem confirmar. -->
            <a href="livros.php" class="botao"> Cancela </a>
        </div>
    </main>
    </body>

</html>
