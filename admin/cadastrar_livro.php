<?php

session_start();

require_once __DIR__ . '/../database/connect.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: /login/login.php");
    exit;
}

$mensagem = '';

if (isset($_POST['cadastrar'])) {

    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $genero = $_POST['genero'];
    $ano = $_POST['ano'];
    $quantidade = $_POST['quantidade'];

    $sql = "INSERT INTO livros 
            (titulo, autor, genero, ano, quantidade)
            VALUES 
            (:titulo, :autor, :genero, :ano, :quantidade)";

    $stmt = $conexao->prepare($sql);

    $stmt->execute([
        'titulo' => $titulo,
        'autor' => $autor,
        'genero' => $genero,
        'ano' => $ano,
        'quantidade' => $quantidade
    ]);

    $mensagem = "Livro cadastrado com sucesso!";
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/style/style.css">

    <title>Cadastrar Livro</title>

</head>
<body>
    <header>

        <h1>EntreCapítulos</h1>

        <p>Área do Administrador</p>

    </header>
    <main>

        <div class="login">
            <h2>Cadastrar Novo Livro</h2>


            <?php
            if ($mensagem != '') {
                echo "<p>$mensagem</p>";
            }
            ?>

            <form method="POST">
                <label for="titulo">
                    Título:
                </label>

                <input
                    type="text"
                    name="titulo"
                    id="titulo"
                    required
                >


                <label for="autor">
                    Autor:
                </label>

                <input
                    type="text"
                    name="autor"
                    id="autor"
                    required
                >


                <label for="genero">
                    Gênero:
                </label>

                <input
                    type="text"
                    name="genero"
                    id="genero"
                    required
                >


                <label for="ano">
                    Ano:
                </label>

                <input
                    type="number"
                    name="ano"
                    id="ano"
                    required
                >


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


                <button type="submit" name="cadastrar">
                    Cadastrar Livro
                </button>

            </form>


            <br>

            <a href="painel.php">
                Voltar para o painel
            </a>

        </div>
    </main>
</body>
</html>