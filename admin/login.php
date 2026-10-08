<?php

session_start();

require_once __DIR__ . '/../database/connect.php';


// Cria uma variável para guardar mensagens de erro.
$mensagem = '';


// Verifica se o botão "Entrar" foi pressionado.
if (isset($_POST['entrar'])) {


    // Pega o e-mail que foi digitado no formulário.
    $email = $_POST['email'];


    // Pega a senha que foi digitada no formulário.
    $senha = $_POST['senha'];


    // Cria um comando SQL para procurar um administrador
    // que tenha o e-mail informado.
    $sql = "SELECT * FROM admin WHERE email = :email";


    // Prepara o comando SQL para ser executado.
    $stmt = $conexao->prepare($sql);


    // Executa a consulta e coloca o e-mail
    // no lugar de :email.
    $stmt->execute([
        'email' => $email
    ]);


    // Pega os dados do administrador encontrado
    // e guarda dentro da variável $admin.
    // FETCH_ASSOC organiza os dados usando o nome das colunas do banco.
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);


    // Verifica se algum administrador foi encontrado.
    if ($admin) {


        // Compara a senha digitada com a senha
        // cadastrada no banco de dados.
        if ($admin['senha'] == $senha) {


            // Guarda o ID do administrador na sessão.
            // Isso permite identificar que ele está logado.
            $_SESSION['admin_id'] = $admin['id'];


            // Guarda o nome do administrador na sessão.
            $_SESSION['admin_nome'] = $admin['nome'];


            // Se o login estiver correto,
            // envia o administrador para o painel.
            header("Location: painel.php");

            exit;

        } else {

            // Se o administrador existe,
            // mas a senha estiver errada,
            // mostra esta mensagem.
            $mensagem = "Senha incorreta.";
        }


    } else {

        // Se nenhum administrador for encontrado
        // com o e-mail informado, mostra esta mensagem.
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


    <!-- Conteúdo principal da página. -->
    <main>

        <!-- Div que recebe o estilo "login" do CSS. -->
        <div class="login">


            <!-- Título do formulário. -->
            <h2>Login do Administrador</h2>


            <?php

            // Verifica se existe alguma mensagem para mostrar.
            // Se $mensagem não estiver vazia,
            // ela será exibida na página.
            if ($mensagem != '') {


                // Mostra a mensagem dentro de um parágrafo.
                echo "<p>$mensagem</p>";
            }

            ?>


            <!-- Formulário de login. -->
            <!-- Os dados serão enviados usando POST. -->
            <form method="POST">


                <!-- Campo para o e-mail. -->
                <label for="email">E-mail:</label>


                <!--
                    Campo onde o administrador
                    digita seu e-mail.
                -->
                <input
                    type="email"
                    name="email"
                    id="email"
                    required
                >


                <!-- Campo para a senha. -->
                <label for="senha">Senha:</label>


                <!--
                    Campo de senha.
                    O conteúdo digitado fica escondido.
                -->
                <input
                    type="password"
                    name="senha"
                    id="senha"
                    required
                >


                <!--
                    Botão que envia o formulário.

                    name="entrar" é usado pelo PHP
                    para verificar se o formulário foi enviado.
                -->
                <button type="submit" name="entrar">
                    Entrar
                </button>

                <br><br>

                <!-- Centraliza o link usando CSS diretamente no HTML. -->
                <div style="text-align: center;">


                    <!-- Link para voltar à página inicial. -->
                    <a href="/projeto_integrador/index.php">
                        Voltar
                    </a>

                </div>
            </form>
        </div>
    </main>
</body>
</html>
