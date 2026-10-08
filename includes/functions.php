<?php

require_once __DIR__ . '/../database/connect.php';


// CADASTRAR USUÁRIO
function cadastrar_user($conexao, $nome, $email, $nascimento, $senha)
{
    $sql = "INSERT INTO usuarios (nome, email, nascimento, senha)
            VALUES (:nome, :email, :nascimento, :senha)";

    $stmt = $conexao->prepare($sql);

    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":nascimento", $nascimento);
    $stmt->bindParam(":senha", $senha);

    return $stmt->execute();
}


// CONSULTAR USUÁRIO
function consultar_user($conexao, $email)
{
    $sql = "SELECT id, nome, email, nascimento, senha
            FROM usuarios
            WHERE email = :email";

    try {

        $stmt = $conexao->prepare($sql);

        $stmt->bindParam(":email", $email);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {

        return false;
    }
}

// CONSULTAR LIVRO

function consultar_livros($conexao)
{
    $sql = "SELECT * FROM livros ORDER BY id";
    $resultado = $conexao->query($sql);

    return $resultado;
}

?>

