<?php 

function protegeQuery( &$str ) {
    $str = str_replace("<","",$str);
    $str = str_replace(">","",$str);
    $str = str_replace("\"","",$str);
    $str = str_replace("(","",$str);
    $str = str_replace(")","",$str);
    $str = str_replace("[","",$str);
    $str = str_replace("]","",$str);
    $str = str_replace("*","",$str);
    $str = str_replace("&","",$str);
    $str = str_replace("%","",$str);
    $str = str_replace("|","",$str);

   
    
    return $str;
}

function verificaCensura( &$str, $palavra ) {
    $str = str_replace("0","",$str);
    $str = str_replace("1","",$str);
    $str = str_replace("2","",$str);
    $str = str_replace("3","",$str);
    $str = str_replace("4","",$str);
    $str = str_replace("5","",$str);
    $str = str_replace("6","",$str);
    $str = str_replace("7","",$str);
    $str = str_replace("8","",$str);
    $str = str_replace("9","",$str);
    $str = str_replace("#","",$str);
   


    if (str_contains($str, $palavra)){ 
        return "CENSURADO";
    }
}

//recebe uma string e retorna somente numeros
function soNumerosDaString($str){ 
    $res = preg_replace('/[^0-9]/s','',$str);
    return $res;
}
?> 