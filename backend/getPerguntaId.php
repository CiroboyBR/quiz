<?php

//cria conexao
require_once("conexaoMysql.php");


    //var_dump($turma);
    
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $resultado = mysqli_query($conn, "SELECT * FROM perguntas WHERE id='$id' limit 1");

    foreach($resultado as $tupla) {
        $pergunta = array("id"=>$tupla['id'], "pergunta"=>$tupla['pergunta'], "a"=>$tupla["a"], "b"=>$tupla["b"], "c"=>$tupla["c"], "d"=>$tupla["d"], "resp"=>$tupla["resposta"], "disciplina"=>$tupla["disciplina"]);
        echo json_encode($pergunta);
        mysqli_close($conn);
        exit();
    }    
}


//echo "<pre>";
//print_r($pergunta);
//echo "</pre>";

mysqli_close($conn);
?>
