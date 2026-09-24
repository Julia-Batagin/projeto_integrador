<?php 
require_once __DIR__. '/../includes/functions.php';

session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mini_sistema/style/style.css">
    <title>Login</title>
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <main>
        <h1>Faça o login para continuar</h1>
        <form action="" method="post">
            <label for="email">E-mail: </label>
            <input type="email" name="email" id="email" placeholder="Insira o email" required ><br>
            <label for="senha">Senha: </label>
            <input type="password" name="senha" id="senha"  placeholder="Insira sua senha."  required><br>
            <input type="submit" value="Entrar">
        </form>
        <?php 
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $usuario = consultar_user($conexao, $_POST['email']);
            if($usuario['email'] == $_POST['email'] && $usuario['senha'] == $_POST['senha']){
                $_SESSION['id'] = $usuario['id'];
                echo "Usuário logado!";
                header("Location: /mini_sistema/index.php");
            }else {
                echo "Usuário ou senha inválido";
            }
        }
        ?>
    </main>
    <?php include __DIR__. '/../includes/footer.php'; ?>
    
</body>
</html>