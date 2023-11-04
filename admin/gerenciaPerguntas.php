<?php
//cria conexao

require_once("../backend/conexaoMysql.php");

$resultado = mysqli_query($conn, "SELECT * FROM perguntas_jose ORDER BY id DESC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/jquery-3-6-0.js"></script>
    <script src="../libs/sweetalert2.all.js"></script>
    <title>Gerenciamento de Perguntas</title>
</head>
<body>
    <header><h1>GERENCIAMENTO DE PERGUNTAS</h1></header>

    <br>

    <table>
        <tr>
            <td>ID</td>
            <td>PERGUNTA</td>
            <td>A</td>
            <td>B</td>
            <td>C</td>
            <td>D</td>
            <td>RESP</td>
            <td>DISC</td>
        </tr>
    <?php
        foreach($resultado as $tupla) {
    ?>            
            <tr onclick="clicaTR(<?= $tupla["id"] ?> );">
            <td><?= $tupla["id"];?></td>
            <td><?= $tupla["pergunta"];?></td>
            <td><?= $tupla["a"];?></td>
            <td><?= $tupla["b"];?></td>
            <td><?= $tupla["c"];?></td>
            <td><?= $tupla["d"];?></td>
            <td><?= $tupla["resposta"];?></td>
            <td><?= $tupla["disciplina"];?></td>
        </tr>
    
    <?php   
        }
    ?>


    </table>
    
     <script>
        function deletaPergunta(idPergunta){
            $.ajax({
                url: "../backend/deletaPergunta.php", //Endereço da requicição
                type: "GET", //tipo da requisição
                data: { 'id': idPergunta }, //os dados da requisição
                dataType: "text" // o formato dos dados da requisição. pode ser TEXT, HTML, XML, JSON, JSONP e SCRIPT
            }).done(function (msg) {
                console.log(msg);
                window.location.reload();
            }).fail(function (jqXHR, textStatus) {
                alert("Requisicao falhou: " + textStatus);
            });
        }
        
        function clicaTR(idPergunta){
            Swal.fire({
                title: 'Deletar?',
                text: "Deletar a pergunta " + idPergunta + "?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'SIM'
                }).then((result) => {
                if (result.isConfirmed) {
                    
                    deletaPergunta(idPergunta);
                   
                    Swal.fire(
                    'Vrau!!',
                    'Foi sal!',
                    'success'
                    ).then((result) => {
                        window.location.reload();
                    })

                }
            })
        }
    </script>
    
      <style>
        td{
            border: 1px solid blue;
        }
        
        tr{
            cursor: pointer;
            
        }
        tr:hover{
            background-color: gray;
        }
        
        header{
            text-align: center;
            margin: 0 auto;
        }
    </style>

</body>
</html>

<?php



mysqli_close($conn);
exit();
?>