<?php
    session_start(); //É necessário iniciar a sessão tambem dentro do valid.php
    include_once('conn.php');

    $email = $_POST['email']; //recebe a variavel vinda do formulario, no caso do input com name email
    $senha = $_POST['senha']; //recebe a variavel vinda do formulario, no caso do input com name senha

    if((isset($email)) && (isset($senha))) { //se o email e a senha forem diferente de vazio o codigo entra no bloco if
        // $usuario = mysqli_real_scape_string($conn, $_POST['email']); usado para escapar de caracteres especiais para evitar sql injection, porém só é usado no mysql.
        // $senha = mysqli_real_scape_string($conn, $_POST['senha']); tambme é usado para previnir no campo de senha

        $sql = "SELECT * FROM users WHERE user_email = ?"; //minha query onde a ? é a minha variavel
        $result = $conn->prepare($sql); //result recebe a query e prepara o sql para execução.
        $result->bindParam(1, $email); //e feita a ligação da variavel com a ? da query.
        $result->execute(); //é executada a query
        $resultado = $result->fetch(PDO::FETCH_OBJ); //retorna um objeto com o resultado da query.

        /*
            bindParam. O primeiro valor é o número do parâmetro – como só temos um, utilizamos 1. Caso haja mais de uma, você deverá especificar em que ordem ele aparece (1, 2, 3…). O segundo valor é o próprio conteúdo que será posto no espaço reservado. Não precisa se preocupar com aspas, validação de SQL Injection, escapar caracteres etc. A classe faz tudo isso.
        */

        // $teste = (string) $resultado->user_pwd; //aqui é feito a conversão para string

        // var_dump($resultado->user_pwd); //mostra o debugger da variavel resultado

        if (empty($resultado)) { //caso for vazio
            $_SESSION['loginErro'] = 'Usuário ou senha incorretas';
            header('location: index.php');
        } else if (isset($resultado)) { //caso for diferente de vazio

            //quando logamos ele pode criar variaveis globais como abaixo;
            $_SESSION['userId'] = $resultado->user_id;
            $_SESSION['userEmail'] = $resultado->user_email; //são sessoes criadas para o usuário, nesse caso não é necessario porem foi criado para fins letivo.
            
            header('location: administrativo.php');
        } else {
            $_SESSION['loginErro'] = 'Usuário ou senha incorretas';
            header('location: index.php');
        }

        // $senhaDb = (string) $resultado->user_pwd;
        // $emailDb = (string) $resultado->user_email;

        // if(($senha == $senhaDb) && ($email == $emailDb)) { //faz a verificação da senha e email caso estiverem certos ele entra no bloco if
        //     header("location: administrativo.php"); //quanto entrar ele redireciona o usuário para a pagina administrativo.php
        // } else {
        //     $_SESSION['loginErro'] = 'Usuário ou senha incorretos';
        //     header('location: index.php');
        // }
    } else { //caso contrario ele vai entra no bloco else
        //loginErro é uma variavel global que enviar uma string no corpo.
        $_SESSION['loginErro'] = 'Usuário ou senha incorretos'; //quando cair no else ele vai emitir uma mensagem de erro e mandar para o index.php logo abaixo.
        header('location: index.php'); //caso entre nesse bloco será redirecionado para o login no endereço index.php
    }
?>