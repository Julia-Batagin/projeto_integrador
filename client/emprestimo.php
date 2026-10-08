<?php
require_once __DIR__ . '/../database/connect.php';
require_once __DIR__ . '/../login/verefica_user.php';

$id_livro = $_GET['livro'];

$sql = "SELECT * FROM livros WHERE id = :id";

$stmt = $conexao->prepare($sql);
$stmt->execute(['id' => $id_livro]);

$livro = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/style/style.css">

    <title>Termos de Empréstimo</title>
</head>

<body>

    <header>
        <h1>EntreCapítulos</h1>
        <p>Seu espaço para descobrir novos livros.</p>
    </header>

    <main>

        <div class="termos">

            <h2>TERMOS DE EMPRÉSTIMO</h2>

            <p>
                <strong>Livro:</strong>
                <?php echo $livro['titulo']; ?>
            </p>

            <p>
                <strong>Autor:</strong>
                <?php echo $livro['autor']; ?>
            </p>

            <p>
                <strong>Prazo de empréstimo:</strong>
                7 dias
            </p>

            <p>
                O livro deverá ser devolvido dentro do prazo estabelecido.
            </p>

            <p>
                Caso o livro seja devolvido após o prazo,
                será aplicada uma multa de
                <strong>R$ 2,00 por dia de atraso.</strong>
            </p>

            <p>
                Em caso de perda ou dano ao livro, o usuário poderá ser
                responsabilizado pela reposição do exemplar.
            </p>

            <button onclick="alugarLivro()">
                Confirmar Empréstimo
            </button>

            <a href="livros.php" class="botao">
                Cancelar
            </a>

        </div>

    </main>

    <script>

        function alugarLivro() {

            window.location.href = "confirmar_emprestimo.php?livro=<?php echo $livro['id']; ?>";

        }
    </script>

</body>

</html>