<?php
require_once("conexaoMysql.php");

$idPergunta = $_GET['id'];



//Insere a variavel $nome na tabela do banco de dados
$resultado = mysqli_query($conn, "DELETE FROM perguntas WHERE id = '$idPergunta'");

if ($resultado)
    echo "DELETADO";
else 
    echo "FAIL";

mysqli_close($conn);
exit();
?>
