<?php

// Importa o arquivo que contém as funções do projeto,
// como a função que consulta um usuário pelo e-mail.
require_once __DIR__ . '/../includes/functions.php';


// Importa o arquivo responsável pela conexão com o banco de dados.
require_once __DIR__ . '/../database/connect.php';


// Inicia a sessão para guardar os dados do usuário logado.
session_start();


// Verifica se o formulário foi enviado pelo método POST.
if ($_SERVER['REQUEST_METHOD'] == "POST") {


    // Procura no banco de dados um usuário
    // que tenha o e-mail digitado no formulário.
    $usuario = consultar_user($conexao, $_POST['email']);


    // Verifica se a função encontrou um usuário.
    // Se retornar false, significa que não encontrou.
    if ($usuario != false) {


        // Verifica se o e-mail e a senha digitados
        // correspondem aos dados encontrados no banco.
        if ($usuario['email'] == $_POST['email'] && $usuario['senha'] == $_POST['senha']) {


            // Guarda o ID do usuário na sessão.
            // Isso permite identificar quem está logado.
            $_SESSION['id'] = $usuario['id'];


            // Redireciona o usuário para a página dos livros.
            header("Location: /client/livros.php");


            // Interrompe a execução do código após o redirecionamento.
            exit;


        } else {

            // Mostra uma mensagem se o e-mail ou a senha estiver incorreto.
            echo "Usuário ou senha inválido";

        }


    } else {

        // Mostra a mesma mensagem caso o e-mail
        // não esteja cadastrado no banco de dados.
        echo "Usuário ou senha inválido";

    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <!-- Define a codificação dos caracteres da página. -->
    <meta charset="UTF-8">


    <!-- Adapta a página para diferentes tamanhos de tela. -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Define o título da página na aba do navegador. -->
    <title>Login</title>


    <!-- Importa o arquivo CSS do projeto. -->
    <link rel="stylesheet" href="/style/style.css">

</head>


<body>

    <!-- Conteúdo principal da página. -->
    <main>


        <!-- Div que utiliza a formatação "login" do CSS. -->
        <div class="login">


            <!-- Título do formulário. -->
            <h1>Login</h1>


            <!--
                Formulário de login.

                action="" faz o formulário enviar os dados
                para a própria página.

                method="POST" envia os dados pelo método POST.
            -->
            <form action="" method="POST">


                <!-- Texto que identifica o campo de e-mail. -->
                <label for="email">E-mail:</label>


                <!-- Campo para o usuário digitar o e-mail. -->
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    placeholder="Insira seu email" 
                    required
                >


                <!-- Texto que identifica o campo de senha. -->
                <label for="senha">Senha:</label>


                <!-- Campo para digitar a senha. -->
                <input 
                    type="password" 
                    id="senha" 
                    name="senha" 
                    placeholder="Insira sua senha" 
                    required
                >


                <!-- Botão que envia o formulário. -->
                <button type="submit">Entrar</button>


            </form>


            <!-- Informa que o usuário pode criar uma conta. -->
            <p>Ainda não possui uma conta?</p>


            <!-- Link para a página de cadastro. -->
            <a href="/login/cadastrar.php">
                Cadastre-se
            </a>


            <!-- Cria um espaço entre os links. -->
            <br><br>


            <!-- Link para voltar à página inicial. -->
            <a href="/projeto_integrador/index.php">
                Voltar
            </a>


        </div>

    </main>

</body>

</html>
