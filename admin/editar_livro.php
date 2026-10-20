<?php

session_start();

require_once __DIR__ . '/../database/connect.php';

if (!isset($_SESSION['admin_id'])) {

    // Envia o usuário para a página de login.
    header("Location: /projeto_integrador/login/login.php");

    // Para a execução do código.
    exit;
}

// Pega o ID do livro que foi enviado pela URL.
$id = $_GET['id'];


// Cria o comando SQL para buscar o livro pelo ID.
$sql = "SELECT * FROM livros WHERE id = :id";

$stmt = $conexao->prepare($sql);


// Executa o comando SQL e substitui :id pelo ID recebido.
$stmt->execute([
    'id' => $id
]);


//Pega os dados do livro encontrado no banco e guarda na variável $livro, organizando-os pelo nome de cada coluna.
$livro = $stmt->fetch(PDO::FETCH_ASSOC);


// Verifica se o formulário foi enviado.
if (isset($_POST['editar'])) {


    // Pega o título digitado no formulário.
    $titulo = $_POST['titulo'];


    // Pega o autor digitado no formulário.
    $autor = $_POST['autor'];


    // Pega o gênero digitado no formulário.
    $genero = $_POST['genero'];


    // Pega o ano digitado no formulário.
    $ano = $_POST['ano'];


    // Pega a quantidade digitada no formulário.
    $quantidade = $_POST['quantidade'];


    // Cria o comando SQL para atualizar o livro.
// UPDATE é usado para alterar dados que já existem.
// O WHERE id = :id garante que somente o livro
// correspondente ao ID seja alterado.
    $sql = "UPDATE livros
            SET titulo = :titulo,
                autor = :autor,
                genero = :genero,
                ano = :ano,
                quantidade = :quantidade
            WHERE id = :id";


    // Prepara o comando UPDATE.
    $stmt = $conexao->prepare($sql);


    // Executa o UPDATE.
    $stmt->execute([
        'titulo' => $titulo,
        'autor' => $autor,
        'genero' => $genero,
        'ano' => $ano,
        'quantidade' => $quantidade,
        'id' => $id
    ]);


    // Depois de salvar as alterações,
// volta o administrador para o painel.
    header("Location: painel.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/projeto_integrador/style/style.css">

    <title>Editar Livro</title>

</head>


<body>

    <!-- Cabeçalho da página. -->
    <header>

        <h1>EntreCapítulos</h1>

        <p>Área do Administrador</p>

    </header>


    <!-- Conteúdo principal da página. -->
    <main>


        <!-- Div que recebe a classe "login"
             para utilizar o estilo do CSS. -->
        <div class="login">


            <!-- Título da página. -->
            <h2>Editar Livro</h2>

            <!--
                Formulário responsável por enviar
                os dados editados.
            -->
            <form method="POST">


                <!-- Campo para o título. -->
                <label for="titulo">
                    Título:
                </label>


                <!--
                    Campo onde o administrador pode
                    alterar o título do livro.

                    value coloca no campo o título
                    que já está salvo no banco.
                -->
                <input type="text" name="titulo" id="titulo" 
                value="<?php echo $livro['titulo']; ?>"
                required
                >


                <!-- Campo para o autor. -->
                <label for="autor">
                    Autor:
                </label>


                <!--
                    Campo para editar o autor.

                    O valor atual do autor é colocado
                    automaticamente no campo.
                -->
                <input type="text" name="autor" id="autor"
                    value="<?php echo $livro['autor']; ?>"
                    required
                >


                <!-- Campo para o gênero. -->
                <label for="genero">
                    Gênero:
                </label>


                <!--
                    Campo para editar o gênero.

                    O valor atual é preenchido
                    automaticamente.
                -->
                <input type="text" name="genero" id="genero"
                    value="<?php echo $livro['genero']; ?>"
                    required
                >


                <!-- Campo para o ano de publicação. -->
                <label for="ano">
                    Ano:
                </label>

                <!--
                   
                    O ano atual do livro é colocado
                    automaticamente no campo.
                -->
                <input type="number" name="ano" id="ano"
                    value="<?php echo $livro['ano']; ?>"
                    required
                >


                <!-- Campo para alterar a quantidade de livros. -->
                <label for="quantidade">
                    Quantidade:
                </label>


                <!--
                    Campo numérico para informar
                    a quantidade disponível.

                    min="0" impede que o usuário
                    coloque uma quantidade menor que zero.
                -->
                <input type="number" name="quantidade" id="quantidade"
                    value="<?php echo $livro['quantidade']; ?>"
                    min="0"
                    required
                >


                <!--
                    Botão responsável por enviar
                    o formulário.

                    name="editar" é importante porque
                    o PHP verifica:
                    isset($_POST['editar'])
                -->
                <button type="submit" name="editar">
                    Salvar Alterações
                </button>


            </form>


            <!-- Apenas cria um espaço entre o formulário e o link. -->
            <br>


            <!--
                Link para voltar para o painel
                sem salvar alterações.
            -->
            <a href="painel.php">
                Voltar para o painel
            </a>

        </div>
    </main>
</body>
</html>
