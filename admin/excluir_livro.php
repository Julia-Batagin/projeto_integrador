<?php

session_start();

require_once __DIR__ . '/projeto_integrador/includes/functions.php';
require_once __DIR__ . '/projeto_integrador/database/connect.php';


// Verifica se existe um administrador logado.
if (!isset($_SESSION['admin_id'])) {

    // Se não estiver logado, envia para a página de login.
    header("Location: /projeto_integrador/login/login.php");

    exit;
}


// Pega o ID do livro que foi enviado pela URL.
$id = $_GET['id'];


// Cria o comando SQL para excluir o livro.
// O :id será substituído pelo ID do livro.
$sql = "DELETE FROM livros WHERE id = :id";


$stmt = $conexao->prepare($sql);


// Executa o comando e coloca o ID recebido no lugar de :id.
$stmt->execute([
    'id' => $id
]);


// Depois de excluir o livro, volta para o painel do administrador.
header("Location: /projeto_integrador/admin/painel.php");

exit;

?>
