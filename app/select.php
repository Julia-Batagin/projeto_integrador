<?php
require_once __DIR__ . '/../login/verefica_user.php';
require_once '../includes/functions.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Projeto_Integrador/style/style.css">
    <title>Relatorio</title>
</head>
<body>
<?php include __DIR__ . '/../includes/header.php' ;
relatorio($conexao);
include __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>