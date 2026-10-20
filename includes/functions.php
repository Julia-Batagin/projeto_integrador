<?php
require_once __DIR__ . '/../database/connect.php';

// Cria uma função para cadastrar um usuário.
// Recebe a conexão e os dados do usuário.
function cadastrar_user($conexao, $nome, $email, $nascimento, $senha)
{
    // Cria o comando SQL para inserir os dados na tabela usuarios.
    $sql = "INSERT INTO usuarios (nome, email, nascimento, senha)
            VALUES (:nome, :email, :nascimento, :senha)";

    // Prepara o comando SQL para execução.
    $stmt = $conexao->prepare($sql);

    // Associa cada marcador ao valor correspondente.
    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":nascimento", $nascimento);
    $stmt->bindParam(":senha", $senha);

    // Executa o cadastro e retorna o resultado.
    return $stmt->execute();
}

// Cria uma função para consultar um usuário pelo e-mail.
// Usado para quando cadastratr o usuário ele já ter um login.
function consultar_user($conexao, $email)
{
    // Cria o comando SQL para buscar os dados do usuário.
    $sql = "SELECT id, nome, email, nascimento, senha
            FROM usuarios
            WHERE email = :email";

    // Tenta executar a consulta.
    try {

        // Prepara o comando SQL.
        $stmt = $conexao->prepare($sql);

        // Associa o e-mail ao marcador :email.
        $stmt->bindParam(":email", $email);

        // Executa a consulta no banco.
        $stmt->execute();

        // Retorna os dados encontrados em formato de array.
        return $stmt->fetch(PDO::FETCH_ASSOC);

    // Captura erros que podem acontecer na consulta.
    } catch (PDOException $e) {

        // Retorna false se ocorrer um erro.
        return false;
    }
}

// Cria uma função para consultar os livros cadastrados.
function consultar_livros($conexao)
{
    // Busca todos os livros e organiza pelo ID.
    $sql = "SELECT * FROM livros ORDER BY id";

    // Executa a consulta e guarda o resultado.
    $resultado = $conexao->query($sql);

    // Retorna o resultado para quem chamou a função.
    return $resultado;
}

?>
