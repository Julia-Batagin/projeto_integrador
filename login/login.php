<?php
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../database/connect.php';

session_start();
?>

<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $usuario = consultar_user($conexao, $_POST['email']);
    if ($usuario != false) {
        if ($usuario['email'] == $_POST['email'] && $usuario['senha'] == $_POST['senha']) {
            $_SESSION['id'] = $usuario['id'];
            header("Location: /livros.php");
            exit;
        } else {
            echo "Usuário ou senha inválido";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/../style/style.css">
</head>
<body>
    <main>
        <div class="login">

            <h1>Login</h1>

            <form action="" method="POST">

                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" placeholder="Insira seu email" required>

                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" placeholder="Insira sua senha" required>

                <button type="submit">Entrar</button>

            </form>

            <p>Ainda não possui uma conta?</p><br>

            <a href="/login/cadastrar.php">Cadastre-se</a>

            <br><br>

            <a href="/index.php">Voltar</a>

        </div>
    </main>

</body>
</html>