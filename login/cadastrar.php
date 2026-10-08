<?php

require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../database/connect.php';

session_start();

$erro = '';
$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $nascimento = $_POST['nascimento'];
    $senha = $_POST['senha'];

    if ($nome == '') {

        $erro = "Preencha o nome.";

    } elseif ($email == '') {

        $erro = "Preencha o email.";

    } elseif ($nascimento == '') {

        $erro = "Preencha a data de nascimento.";

    } elseif ($senha == '') {

        $erro = "Preencha a senha.";

    } else {

        $resultado = cadastrar_user(
            $conexao,
            $nome,
            $email,
            $nascimento,
            $senha
        );

        if ($resultado) {

            header("Location: /projeto_integrador/login/login.php");
            exit;

        } else {

            $erro = "Não foi possível realizar o cadastro.";

        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/style/style.css">

    <title>Cadastro</title>

</head>

<body>

    <main>

        <div class="login">

            <h1>Cadastro</h1>

            <?php

            if ($erro != '') {
                echo "<p>$erro</p>";
            }

            ?>

            <form action="" method="post">

                <label for="nome">Nome:</label>

                <input
                    type="text"
                    name="nome"
                    id="nome"
                    placeholder="Insira seu nome"
                    required
                >

                <label for="email">E-mail:</label>

                <input
                    type="email"
                    name="email"
                    id="email"
                    placeholder="Insira seu email"
                    required
                >

                <label for="nascimento">Data de nascimento:</label>

                <input
                    type="date"
                    name="nascimento"
                    id="nascimento"
                    required
                >

                <label for="senha">Senha:</label>

                <input
                    type="password"
                    name="senha"
                    id="senha"
                    placeholder="Insira sua senha"
                    required
                >

                <input type="submit" value="Cadastrar">

            </form>

            <p>Já possui uma conta?</p>

            <a href="/login/login.php">
                Voltar para o login
            </a>

        </div>

    </main>

</body>

</html>