<?php

// Inicia a sessão para acessar o ID do usuário logado.
session_start();

// Inclui o arquivo que conecta ao banco de dados.
require_once __DIR__ . '/../database/connect.php';

// Verifica se o usuário está logado.
require_once __DIR__ . '/../login/verefica_user.php';

// Pega o ID do livro pela URL.
$id_livro = $_GET['livro'];

// Pega o ID do usuário que está logado.
$id_usuario = $_SESSION['id'];

try {

    // Inicia uma transação no banco de dados.
    // Isso permite confirmar ou desfazer as alterações juntas.
    $conexao->beginTransaction();

    // Comando SQL para diminuir a quantidade do livro em 1.
    // WHERE id = :id seleciona o livro pelo ID.
    // AND quantidade > 0 impede alugar se não houver unidades.
    $sql = "UPDATE livros
            SET quantidade = quantidade - 1
            WHERE id = :id
            AND quantidade > 0";

    // Prepara o comando SQL.
    $stmt = $conexao->prepare($sql);

    // Executa o comando usando o ID do livro.
    $stmt->execute([
        'id' => $id_livro
    ]);

    // Verifica se a quantidade foi alterada.
    if ($stmt->rowCount() > 0) {

        // Registra o usuário, o livro e a data do aluguel.
        $sql = "INSERT INTO emprestimos
                (usuario_id, livro_id, data_emprestimo)
                VALUES (:usuario_id, :livro_id, CURRENT_DATE)";

        // Prepara o comando para registrar o empréstimo.
        $stmt = $conexao->prepare($sql);

        // Envia os IDs do usuário e do livro ao banco.
        $stmt->execute([
            'usuario_id' => $id_usuario,
            'livro_id' => $id_livro
        ]);

        // Confirma as duas operações no banco.
        $conexao->commit();

        // Mostra a mensagem de sucesso e volta para os livros.
        echo "<script>
            alert('Livro alugado com sucesso!');
            window.location.href = 'livros.php';
        </script>";

    } else {

        // Desfaz a transação se o livro estiver indisponível.
        $conexao->rollBack();

        // Informa que o livro não está disponível.
        echo "<script>
            alert('Livro indisponível!');
            window.location.href = 'livros.php';
        </script>";
    }

} catch (PDOException $erro) {

    // Desfaz as alterações caso aconteça algum erro.
    if ($conexao->inTransaction()) {
        $conexao->rollBack();
    }

    // Exibe uma mensagem caso não seja possível registrar o aluguel.
    echo "<script>
        alert('Não foi possível registrar o aluguel.');
        window.location.href = 'livros.php';
    </script>";
}

// Encerra a execução do código.
exit;

?>
