<?php

// Verifica se ainda não existe uma sessão ativa.
if (session_status() == PHP_SESSION_NONE) {

    // Inicia a sessão do usuário.
    session_start();
}

// Verifica se a variável 'id' não está definida na sessão.
if (!isset($_SESSION['id'])) {

    // Se o usuário não estiver logado, redireciona para a página inicial.
    header("Location: /projeto_integrador/index.php");

    // Encerra a execução do código após o redirecionamento.
    exit;
}

?>
