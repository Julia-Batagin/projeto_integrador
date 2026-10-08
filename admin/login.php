<?php

session_start();

require_once __DIR__ . '/../database/connect.php';

$mensagem = '';

if (isset($_POST['entrar'])) {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM admin WHERE email = :email";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([
        'email' => $email
    ]);

    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin) {
        if ($admin['senha'] == $senha) {

            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_nome'] = $admin['nome'];

            header("Location: painel.php");
            exit;

        } else {
            $mensagem = "Senha incorreta.";
        }
    } else {
        $mensagem = "Administrador não encontrado.";

    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/style.css">
    <title>Login Administrador</title>

</head>
<body>
    <header>

        <h1>EntreCapítulos</h1>

        <p>Área do Administrador</p>

    </header>
    <main>

        <div class="login">

            <h2>Login do Administrador</h2>

            <?php
            if ($mensagem != '') {

                echo "<p>$mensagem</p>";
            }

            ?>

            <form method="POST">
                <label for="email">E-mail:</label>
                <input type="email" name="email" id="email" required>
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" required>
                <button type="submit" name="entrar">Entrar</button>
                <br><br>

               <div style="text-align: center;">
                    <a href="/projeto_integrador/index.php">Voltar</a>
                </div>

            </form>
        </div>
    </main>
</body>
</html>