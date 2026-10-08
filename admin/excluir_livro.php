<?php

session_start();

require_once __DIR__ . '/../database/connect.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: /login/login.php");
    exit;
}

$id = $_GET['id'];
$sql = "DELETE FROM livros WHERE id = :id";
$stmt = $conexao->prepare($sql);
$stmt->execute([
    'id' => $id
]);

header("Location: painel.php");
exit;

?>