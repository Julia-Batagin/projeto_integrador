<?php

// Define o endereço do servidor do banco de dados.
$host = "192.168.10.30";

// Define o nome do banco de dados.
$dbname = "biblioteca";

// Define a porta utilizada pelo PostgreSQL.
$port = "5432";

// Define o usuário que acessará o banco.
$user = "biblioteca_user";

// Define a senha do usuário do banco.
$pass = "Jbatagin";

// Inicia o bloco para tentar realizar a conexão.
try {

    // Cria a conexão com o banco de dados usando PDO.
    $conexao = new PDO(
        "pgsql:host=$host;dbname=$dbname",
        $user,
        $pass
    );

    // Retorna a conexão criada.
    return $conexao;

// Captura um erro caso a conexão falhe.
} catch (PDOException $e) {

    // Exibe uma mensagem informando que houve um erro na conexão.
    echo "Erro: Erro ao conectar, tente novamente" . $e->getMessage();

}

?>
