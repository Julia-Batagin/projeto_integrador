<?php 
require_once __DIR__. '/../includes/functions.php';
require_once __DIR__. '/../login/verefica_user.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mini_sistema/style/style.css">
    <title>Cadastro Aluno</title>
</head>
<body>
    <?php include '../includes/header.php'; ?><br>
    <form action="" method="post">
        <label for="email">E-mail: </label>
        <input type="text" name="email" id="email"><br>

        <label for="senha">Senha: </label>
        <input type="password" name="senha" id="senha"><br>

        <input type="submit" value="Cadastrar">

    </form>
    <?php 
    if($_SERVER['REQUEST_METHOD'] == "POST"){
    cadastrar_user($conexao, $_POST['email'], $_POST['senha']);
    }
    include __DIR__. '/../includes/footer.php'; 
    
    ?>
    
</body>
</html>
