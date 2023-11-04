<?php
require_once("conexaoMysql.php");
//print_r($_POST);

$perg=$_POST['perg'];
$a=$_POST['a'];
$b=$_POST['b'];
$c=$_POST['c'];
$d=$_POST['d'];
$resp=$_POST['resp'];
$disciplina=$_POST['disciplina'];

/*echo $perg."<br>";
echo $a."<br>";
echo $b."<br>";
echo $c."<br>";
echo $d."<br>";
echo $resp."<br>";
*/


//Insere a variavel $nome na tabela do banco de dados
$resultado = mysqli_query($conn, "INSERT INTO perguntas(pergunta, a, b, c, d, resposta, disciplina) VALUES('$perg', '$a', '$b', '$c','$d', $resp, '$disciplina')");
if ($resultado)
    echo "CADASTRADO EFETUADO COM SUCESSO!";
else 

    echo "FALHA NO CADASTRO!";

?>
