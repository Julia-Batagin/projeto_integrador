<?php

// Verifica se ainda não existe uma sessão ativa.
if (session_status() == PHP_SESSION_NONE) {

    // Inicia uma nova sessão para poder acessar e modificar seus dados.
    session_start();
}

// Apaga todos os dados armazenados na sessão atual.
$_SESSION = array();

// Encerra a sessão do usuário, finalizando o acesso aos dados da sessão.
session_destroy();

// Redireciona o usuário para a página inicial do site.
header("Location: /projeto_integrador/index.php");

// Encerra a execução do código após o redirecionamento.
exit;

?>
