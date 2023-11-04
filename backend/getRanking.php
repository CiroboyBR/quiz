<?php
//cria conexao

require_once("conexaoMysql.php");

$resultado = mysqli_query($conn, "SELECT * FROM ranking ORDER BY pontos DESC limit 30");

//echo "<pre>";

$rank = array();

foreach($resultado as $tupla) {
    
    array_push($rank, array("id"=>$tupla['id'], "nome"=>$tupla['nome'], "pontos"=>$tupla['pontos']));
    
}

echo json_encode($rank);
mysqli_close($conn);
exit();

//print_r($pergunta);
//echo "</pre>";


?>