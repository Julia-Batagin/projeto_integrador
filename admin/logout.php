<?php

// Verifica se já existe uma sessão iniciada.
if (session_status() == PHP_SESSION_NONE) {

    // Se não existir, inicia uma sessão.
    session_start();
}


// Apaga todos os dados que estão armazenados na sessão.
$_SESSION = array();

// Encerra a sessão atual.
// Depois disso, o administrador deixa de estar logado.
session_destroy();

// Envia o administrador de volta para a página inicial.
header("Location: /../index.php");

exit;

?>
