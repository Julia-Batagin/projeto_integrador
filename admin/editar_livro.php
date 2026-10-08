<?php

session_start();

require_once __DIR__ . '/../database/connect.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: /login/login.php");
    exit;
}

$id = $_GET['id'];

$sql = "SELECT * FROM livros WHERE id = :id";

$stmt = $conexao->prepare($sql);

$stmt->execute([
    'id' => $id
]);

$livro = $stmt->fetch(PDO::FETCH_ASSOC);


if (isset($_POST['editar'])) {

    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $genero = $_POST['genero'];
    $ano = $_POST['ano'];
    $quantidade = $_POST['quantidade'];

    $sql = "UPDATE livros
            SET titulo = :titulo,
                autor = :autor,
                genero = :genero,
                ano = :ano,
                quantidade = :quantidade
            WHERE id = :id";

    $stmt = $conexao->prepare($sql);

    $stmt->execute([
        'titulo' => $titulo,
        'autor' => $autor,
        'genero' => $genero,
        'ano' => $ano,
        'quantidade' => $quantidade,
        'id' => $id
    ]);

    header("Location: painel.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/style.css">
    <title>Editar Livro</title>

</head>
<body>

    <header>

        <h1>EntreCapítulos</h1>

        <p>Área do Administrador</p>

    </header>


    <main>

        <div class="login">

            <h2>Editar Livro</h2>

            <form method="POST">
                <label for="titulo">
                    Título:
                </label>

                <input
                    type="text"
                    name="titulo"
                    id="titulo"
                    value="<?php echo $livro['titulo']; ?>"
                    required
                >

                <label for="autor">
                    Autor:
                </label>

                <input
                    type="text"
                    name="autor"
                    id="autor"
                    value="<?php echo $livro['autor']; ?>"
                    required
                >

                <label for="genero">
                    Gênero:
                </label>

                <input
                    type="text"
                    name="genero"
                    id="genero"
                    value="<?php echo $livro['genero']; ?>"
                    required
                >

                <label for="ano">
                    Ano:
                </label>

                <input
                    type="number"
                    name="ano"
                    id="ano"
                    value="<?php echo $livro['ano']; ?>"
                    required
                >

                <label for="quantidade">
                    Quantidade:
                </label>

                <input
                    type="number"
                    name="quantidade"
                    id="quantidade"
                    value="<?php echo $livro['quantidade']; ?>"
                    min="0"
                    required
                >

                <button type="submit" name="editar">
                    Salvar Alterações
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