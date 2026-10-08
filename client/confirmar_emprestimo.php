<?php

require_once __DIR__ . '/../database/connect.php';
require_once __DIR__ . '/../login/verefica_user.php';

$id_livro = $_GET['livro'];

$sql = "UPDATE livros
        SET quantidade = quantidade - 1
        WHERE id = :id
        AND quantidade > 0";

$stmt = $conexao->prepare($sql);

$stmt->execute([
    'id' => $id_livro
]);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Empréstimo</title>
</head>

<body>

    <script>
        alert("Livro alugado com sucesso!");

        window.location.href = "livros.php";
    </script>

</body>

</html>