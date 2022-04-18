<?php 
    include('protect.php');
    //o session estará dentro do arquivo protect.php isso possibilita que ninguem que não esteja logado veja essa pagina.
    // session_start();

    // if(!isset($_SESSION)) { //caso não exista ou não tenha iniciado a sessão, inicie.
    //     session_start();
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>administrativo</h2>
    <p>Status: 
        <?php
            echo "Id: ".$_SESSION['userId']."<br/>";
            echo "Email: ".$_SESSION['userEmail']; //nesse momento estou usando a variavel global criada no momento de iniciar a sessão no valid.php linha 33;
        ?>
    </p>

    <br/>
    <!-- abaixo estou chamando dentro de uam tag a, meu documento de logout.php -->
    <a href="logout.php">Sair</a>
</body>
</html>