<?php 
require_once __DIR__ . '/../includes/functions.php'; 
require_once __DIR__ . '/../login/verefica_user.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Projeto_Integrador/style/style.css">
    <title>Consulta Aluno</title>
</head>
<body>
    <?php require_once __DIR__ . '/../includes/header.php' ?>
    <h1>Consultar aluno</h1>
    <form action="" method="post">
        <label for="id">ID: </label>
        <input type="number" name="id" id="id">
        <input type="submit" value="Consultar">
    </form>
    <?php 
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        consultar($conexao, $_POST['id']);
    }
    ?>
    <?php require_once __DIR__ . '/../includes/footer.php' ?>
</body>
</html>
