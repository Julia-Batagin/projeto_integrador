<?php

session_start();

require_once __DIR__ . '/../database/connect.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: /login/login.php");
    exit;
}

$sql = "SELECT * FROM livros ORDER BY id";
$resultado = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/style.css">
    <title>Painel do Administrador</title>

</head>
<body>

    <header>

        <h1>EntreCapítulos</h1>

        <p>
            Área do Administrador
        </p>

    </header>

   <main>
    <div class="painel-admin">

        <h2>Painel do Administrador</h2>

        <p>
            Olá, <?php echo $_SESSION['admin_nome']; ?>!
        </p>

        <a href="cadastrar_livro.php" class="botao-admin">
            Cadastrar Novo Livro
        </a>

        <section class="admin-livros">

            <?php
            while ($livro = $resultado->fetch(PDO::FETCH_ASSOC)) {
            ?>

                <div class="card-admin">

                    <h3>
                        <?php echo $livro['titulo']; ?>
                    </h3>

                    <p>
                        <strong>Autor:</strong>
                        <?php echo $livro['autor']; ?>
                    </p>

                    <p>
                        <strong>Gênero:</strong>
                        <?php echo $livro['genero']; ?>
                    </p>

                    <p>
                        <strong>Ano:</strong>
                        <?php echo $livro['ano']; ?>
                    </p>

                    <p>
                        <strong>Quantidade:</strong>
                        <?php echo $livro['quantidade']; ?>
                    </p>


                    <div class="botoes-admin">

                        <a
                            href="editar_livro.php?id=<?php echo $livro['id']; ?>"
                            class="botao-editar">
                            Editar
                        </a>

                        <a 
                            href="excluir_livro.php?id=<?php echo $livro['id']; ?>"
                            class="botao-excluir"
                            onclick="return confirm('Tem certeza que deseja excluir este livro?');"
                        >
                            Excluir
                        </a>

                    </div>
                </div>
            <?php

            }

            ?>
        </section>

        <br>

       <a href="/projeto_integrador/index.php" class="voltar" >Voltar</a>

    </div>

    </div>
    </main>

</body>

</html>