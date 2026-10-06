<?php 
$host = "192.168.10.30";
$dbname = "biblioteca";
$port = "5432";
$user = "biblioteca_user";
$pass = "Jbatagin";
try {
    $conexao = new PDO(
    "pgsql:host=$host;dbname=$dbname", 
    $user,
    $pass
    );
    return $conexao;
} catch(PDOException $e){
    echo "Erro: Erro ao conectar, tente novamente" . $e->getMessage();
}

?>


