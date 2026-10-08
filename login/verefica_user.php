<?php 
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
if(!isset($_SESSION['id'])){
    header("Location: /projeto_integrador/index.php");
    exit;
}  //!= Antes significa diferente, nesse caso "Se não estiver setado".

?>