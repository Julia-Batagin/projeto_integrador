<?php

require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../database/connect.php';

session_start();

// Cria variáveis vazias para guardar erros e mensagens.
// $erro = ''; guarda mensagens de erro, como “Preencha o nome”.
// $mensagem = ''; guarda mensagens de sucesso ou outras informações.
$erro = '';
$mensagem = '';

// Verifica se o formulário foi enviado pelo método POST.
// O server requer o metodo post.
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Recebe os dados digitados no formulário.
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $nascimento = $_POST['nascimento'];
    $senha = $_POST['senha'];

    // Verifica se o nome foi preenchido.
    if ($nome == '') {

        // Guarda a mensagem de erro.
        $erro = "Preencha o nome.";

    // Verifica se o e-mail foi preenchido.
    } elseif ($email == '') {

        $erro = "Preencha o email.";

    // Verifica se a data de nascimento foi preenchida.
    } elseif ($nascimento == '') {

        $erro = "Preencha a data de nascimento.";

    // Verifica se a senha foi preenchida.
    } elseif ($senha == '') {

        $erro = "Preencha a senha.";

    } else {

        // Chama a função que cadastra o usuário no banco.
        // Envia a conexão e os dados preenchidos.
        $resultado = cadastrar_user(
            $conexao,
            $nome,
            $email,
            $nascimento,
            $senha
        );

        // Verifica se o cadastro foi realizado.
        if ($resultado) {

            // Redireciona para a página de login.
            header("Location: /projeto_integrador/login/login.php");

            // Encerra a execução após o redirecionamento.
            exit;

        } else {

            // Exibe um erro caso o cadastro não seja realizado.
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

    <!-- Importa o arquivo CSS para estilizar a página. -->
    <link rel="stylesheet" href="/projeto_integrador/style/style.css">

    <!-- Define o título da aba do navegador. -->
    <title>Cadastro</title>

</head>
<body>

    <!-- Agrupa o conteúdo principal da página. -->
    <main>

        <!-- Div que organiza a área de cadastro. -->
        <div class="login">

            <!-- Título da página. -->
            <h1>Cadastro</h1>

            <?php

            // Verifica se existe alguma mensagem de erro.
            if ($erro != '') {

                // Exibe a mensagem de erro na página.
                echo "<p>$erro</p>";
            }

            ?>

            <!-- Formulário que envia os dados pelo método POST. -->
            <form action="" method="post">

                <!-- Rótulo do campo de nome. -->
                <label for="nome">Nome:</label>

                <!-- Campo para digitar o nome. -->
                <input
                    type="text"
                    name="nome"
                    id="nome"
                    placeholder="Insira seu nome"
                    required
                >

                <!-- Rótulo do campo de e-mail. -->
                <label for="email">E-mail:</label>

                <!-- Campo para digitar o e-mail. -->
                <input
                    type="email"
                    name="email"
                    id="email"
                    placeholder="Insira seu email"
                    required
                >

                <!-- Rótulo do campo de nascimento. -->
                <label for="nascimento">Data de nascimento:</label>

                <!-- Campo para selecionar a data de nascimento. -->
                <input
                    type="date"
                    name="nascimento"
                    id="nascimento"
                    required
                >

                <!-- Rótulo do campo de senha. -->
                <label for="senha">Senha:</label>

                <!-- Campo que oculta os caracteres digitados. -->
                <input
                    type="password"
                    name="senha"
                    id="senha"
                    placeholder="Insira sua senha"
                    required
                >

                <!-- Botão que envia o formulário para o PHP. -->
                <input type="submit" value="Cadastrar">

            </form>

            <!-- Informa que o usuário pode já ter uma conta. -->
            <p>Já possui uma conta?</p>

            <!-- Link para abrir a página de login. -->
            <a href="/projeto_integrador/login/login.php">
                Voltar para o login
            </a>

        </div>
    </main>
</body>
</html>
