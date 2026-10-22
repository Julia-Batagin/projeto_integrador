
<?php

session_start();

require_once __DIR__ . '/../database/connect.php';


// Verifica se existe um administrador logado.
if (!isset($_SESSION['admin_id'])) {

    // Se não estiver logado, envia para a página de login.
    header("Location: /projeto_integrador/login/login.php");

    exit;
}


// Pega o ID do livro que foi enviado pela URL.
$id = $_GET['id'];


// Verifica se o livro possui empréstimos registrados.
$sql = "SELECT id FROM emprestimos WHERE livro_id = :id";

$stmt = $conexao->prepare($sql);

$stmt->execute([
    'id' => $id
]);


// Se encontrar algum empréstimo, impede a exclusão.
if ($stmt->fetch()) {

    echo "<script>
        alert('Não é possível excluir este livro, pois existem empréstimos registrados.');
        window.location.href = '/projeto_integrador/admin/painel.php';
    </script>";

    exit;
}


// Cria o comando SQL para excluir o livro.
$sql = "DELETE FROM livros WHERE id = :id";

$stmt = $conexao->prepare($sql);


// Executa o comando e coloca o ID recebido no lugar de :id.
$stmt->execute([
    'id' => $id
]);


// Exibe uma mensagem de sucesso e volta para o painel.
echo "<script>
    alert('Livro excluído com sucesso!');
    window.location.href = '/projeto_integrador/admin/painel.php';
</script>";

exit;

?>
