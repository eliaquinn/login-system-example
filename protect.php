<?php
    ///a função da pagina protect.php é evitar que usuário acessem paginas que só podem ser acessadas caso estejam logado.

    if(!isset($_SESSION)) { //se não houver sessão ativa, entre nesse bloco.
        session_start(); //inicia a sessão.
    }

    if(!isset($_SESSION['userId'])) { //caso não tenha nenhuma sessão com o id definido na sessão, ele executará o bloco if.
        die('Voce não pode acessar esta pagina'); //ele mata o script e envia a mensagem.
    }
?> 