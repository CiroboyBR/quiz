<?php

require_once("conexaoMysql.php");
//print_r($_POST);

$nome = $_POST['nome'];
$pontos = $_POST['pontos'];


//Insere a variavel $nome na tabela do banco de dados
$resultado = mysqli_query($conn, "INSERT INTO ranking(nome, pontos) VALUES('$nome', '$pontos')");

if ($resultado)
    echo "OK";
else 

    echo "FAIL";
    
    mysqli_close($conn);
    exit();

?>
