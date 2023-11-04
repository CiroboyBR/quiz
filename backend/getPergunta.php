<?php

//cria conexao
//$conn = mysqli_connect('localhost', 'u885264202_eeep', 'Eeep.2023', 'u885264202_eeep');    
require_once("conexaoMysql.php");

$turma = 0;

if(isset($_POST['turma']))
    $turma = $_POST['turma'];

    //var_dump($turma);
    
if(isset($_GET['idTeste'])){
    $idTeste = $_GET['idTeste'];
    $resultado = mysqli_query($conn, "SELECT * FROM perguntas WHERE id='$idTeste' limit 1");

    foreach($resultado as $tupla) {
        $pergunta = array("id"=>$tupla['id'], "pergunta"=>$tupla['pergunta'], "a"=>$tupla["a"], "b"=>$tupla["b"], "c"=>$tupla["c"], "d"=>$tupla["d"], "resp"=>$tupla["resposta"], "disciplina"=>$tupla["disciplina"]);
        echo json_encode($pergunta);
        mysqli_close($conn);
        exit();
    }    
}


if(intval($turma) == 1) // 1 redes
    $resultado = mysqli_query($conn, "SELECT * FROM perguntas WHERE disciplina='COM DADOS' or disciplina='PLAN CARR' ORDER BY RAND() limit 1");
else if(intval($turma) == 2) // 2 info
    $resultado = mysqli_query($conn, "SELECT * FROM perguntas WHERE disciplina='POO' or disciplina='PROG WEB' or disciplina='ROBOTICA' ORDER BY RAND() limit 1");
else if(intval($turma) == 3)//3 info
    $resultado = mysqli_query($conn, "SELECT * FROM perguntas WHERE disciplina='LAB WEB' or disciplina='LAB SOFT' ORDER BY RAND() limit 1");
else if(intval($turma) == 4)//1 info LOGICA DE PROG
    $resultado = mysqli_query($conn, "SELECT * FROM perguntas WHERE disciplina='LOGICA' ORDER BY RAND() limit 1");
else if(intval($turma) == 5)//1 REDES SO
    $resultado = mysqli_query($conn, "SELECT * FROM perguntas WHERE disciplina='SOL' ORDER BY RAND() limit 1");
else if($turma == 0) //se nao tiver pega geral
     $resultado = mysqli_query($conn, "SELECT * FROM perguntas ORDER BY RAND() limit 1");

//echo "<pre>";

foreach($resultado as $tupla) {
    
    $pergunta = array("id"=>$tupla['id'], "pergunta"=>$tupla['pergunta'], "a"=>$tupla["a"], "b"=>$tupla["b"], "c"=>$tupla["c"], "d"=>$tupla["d"], "resp"=>$tupla["resposta"], "disciplina"=>$tupla["disciplina"]);
    echo json_encode($pergunta);
    mysqli_close($conn);
    exit();
}

//print_r($pergunta);
//echo "</pre>";

mysqli_close($conn);
?>