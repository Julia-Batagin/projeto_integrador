<?php
require_once __DIR__ . '/../login/verefica_user.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mini_sistema/style/style.css">
    <title>Relatorio</title>
</head>
<body>
    <?php include __DIR__ . '/../includes/header.php' ?>
    <main>
        <?php 
require_once __DIR__ . '/../database/connect.php'; // Conecta ao Banco de Dados

$sql = "SELECT * FROM alunos";

$stmt = $conexao->prepare($sql);
$stmt->execute();

$alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($alunos as $aluno){
    echo "<hr>";
    echo "ID: {$aluno['id']}<br>";
    echo "Nome: {$aluno['nome']}<br>";
    echo "Nascimento: {$aluno['nasc']}<br>";
    echo "Turma: {$aluno['turma']}<br>";
    echo "Ativo: {$aluno['ativo']}<br>";
}
?>
    </main>

<?php include __DIR__ . '/../includes/footer.php' ?>
</body>
</html>