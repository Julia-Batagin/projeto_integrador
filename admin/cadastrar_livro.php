<?php
// Inicia uma sessão (guarda infomações do usuário)
session_start();

// O __DIR__ : Mostra a pasta onde este arquivo está localizado.
require_once __DIR__ . '/../database/connect.php';


// $_SESSION['admin_id'] guarda o ID do administrador quando ele faz login.
// O ! significa "não": "Se o admin_id NÃO existir, significa que o administrador não está logado."
if (!isset($_SESSION['admin_id'])) {

    // Manda o usuário para a página de login.
    header("Location: /login/login.php");
    exit;
}


// Cria uma variável vazia para guardar uma mensagem, será usada nesse para mostrar "Livro cadastrado com sucesso!".
$mensagem = '';

// Serve para cadastro. Quando o botão é clicado, $_POST['cadastrar'] passa a existir.
if (isset($_POST['cadastrar'])) {


    // Pega o que foi digitado no campo "titulo".
    // $_POST recebe os dados enviados pelo formulário.
    $titulo = $_POST['titulo'];

    // Pega o autor digitado no formulário.
    $autor = $_POST['autor'];

    // Pega o gênero digitado no formulário.
    $genero = $_POST['genero'];

    // Pega o ano digitado no formulário.
    $ano = $_POST['ano'];

    // Pega a quantidade de livros digitada.
    $quantidade = $_POST['quantidade'];


    // Cria o comando SQL que vai cadastrar o livro no banco de dados.
    // INSERT INTO significa "inserir dados". Nesse caso os dados do livro que quero cadastrar.
    $sql = "INSERT INTO livros 
            (titulo, autor, genero, ano, quantidade)
            VALUES 
            (:titulo, :autor, :genero, :ano, :quantidade)";

    // O prepare() prepara a consulta antes de enviar para o banco.
    // $conexao é a conexão com o PostgreSQL criada no connect.php.
    $stmt = $conexao->prepare($sql);


    // Executa o comando SQL, recebendo o que foi digitado.
    $stmt->execute([

        // :titulo recebe o valor da variável $titulo.
        'titulo' => $titulo,

        // :autor recebe o valor da variável $autor.
        'autor' => $autor,

        // :genero recebe o valor da variável $genero.
        'genero' => $genero,

        // :ano recebe o valor da variável $ano.
        'ano' => $ano,

        // :quantidade recebe o valor da variável $quantidade.
        'quantidade' => $quantidade
    ]);


    // Depois que o livro é cadastrado,
    // colocamos uma mensagem de sucesso na variável $mensagem.
    $mensagem = "Livro cadastrado com sucesso!";

}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Importa o arquivo CSS do projeto. -->
    <link rel="stylesheet" href="/style/style.css">

    <title>Cadastrar Livro</title>

</head>
<body>
    <!-- Cabeçalho da página. -->
    <header>
        <h1>EntreCapítulos</h1>
        <p>Área do Administrador</p>
    </header>


    <!-- Conteúdo principal da página. -->
    <main>
        <!-- Div usada para aplicar o estilo da classe "login". -->
        <div class="login">
            <h2>Cadastrar Novo Livro</h2>

            <?php

            // Verifica se existe alguma mensagem.
            if ($mensagem != '') {

                // Mostra a mensagem dentro de um parágrafo.
                echo "<p>$mensagem</p>";
            }

            ?>


            <!--
            Cria o formulário, pelo método POST. Os dados enviados não ficam aparecendo na URL.
            -->
            <form method="POST">


                <!-- Nome do campo para o título. -->
                <label for="titulo">
                    Título:
                </label>


                <!--
                Campo onde o administrador digita o título.

                type="text" = campo de texto.

                name="titulo" = nome usado pelo PHP para pegar o valor.

                id="titulo" = identifica o campo no HTML.

                required = torna o preenchimento obrigatório.
                -->
                <input
                    type="text"
                    name="titulo"
                    id="titulo"
                    required
                >


                <!-- Campo do autor. -->
                <label for="autor">
                    Autor:
                </label>

                <input
                    type="text"
                    name="autor"
                    id="autor"
                    required
                >


                <!-- Campo do gênero. -->
                <label for="genero">
                    Gênero:
                </label>

                <input
                    type="text"
                    name="genero"
                    id="genero"
                    required
                >


                <!-- Campo do ano. -->
                <label for="ano">
                    Ano:
                </label>

                <input
                    type="number"
                    name="ano"
                    id="ano"
                    required
                >


                <!-- Campo da quantidade de livros. -->
                <label for="quantidade">
                    Quantidade:
                </label>

                <input
                    type="number"
                    name="quantidade"
                    id="quantidade"
                    min="0"
                    required
                >


                <!--
                Botão que envia o formulário.

                name="cadastrar" é importante porque o PHP verifica:

                isset($_POST['cadastrar'])

                para saber se o formulário foi enviado.
                -->
                <button type="submit" name="cadastrar">
                    Cadastrar Livro
                </button>

            </form>

            <br>


            <!-- Link para voltar ao painel do administrador. -->
            <a href="painel.php">
                Voltar para o painel
            </a>


        </div>

    </main>

</body>

</html>
