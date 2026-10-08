<?php

require_once __DIR__ . '/../database/connect.php';
require_once __DIR__ . '/../login/verefica_user.php';

$sql = "SELECT 
            usuarios.nome,
            livros.titulo,
            emprestimos.data_aluguel
        FROM emprestimos
        INNER JOIN usuarios 
            ON emprestimos.id_usuario = usuarios.id
        INNER JOIN livros 
            ON emprestimos.id_livro = livros.id
        ORDER BY emprestimos.data_aluguel DESC";

$stmt = $conexao->prepare($sql);
$stmt->execute();

$alugueis = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/style/style.css">

    <title>Relatório de Aluguéis</title>

</head>

<body>

    <main>

        <div class="painel-admin">

            <h1>Relatório de Aluguéis</h1>

            <p>Confira quem alugou cada livro.</p>

            <?php if (count($alugueis) > 0) { ?>

                <table>

                    <tr>
                        <th>Usuário</th>
                        <th>Livro</th>
                        <th>Data do aluguel</th>
                    </tr>

                    <?php foreach ($alugueis as $aluguel) { ?>

                        <tr>

                            <td>
                                <?php echo $aluguel['nome']; ?>
                            </td>

                            <td>
                                <?php echo $aluguel['titulo']; ?>
                            </td>

                            <td>
                                <?php echo date('d/m/Y', strtotime($aluguel['data_aluguel'])); ?>
                            </td>

                        </tr>

                    <?php } ?>

                </table>

            <?php } else { ?>

                <p>Nenhum livro foi alugado ainda.</p>

            <?php } ?>

            <br>

            <a href="/admin/index.php" class="voltar">
                Voltar
            </a>

            <a href="/logout.php" class="sair-admin">
                Sair da conta
            </a>

        </div>

    </main>

</body>

</html>