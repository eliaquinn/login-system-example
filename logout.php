<?php 
    session_start(); //inicia a sessão

    
    unset( //pode ser usado assim caso queira, ou usando o session_destroy();
        $_SESSION['userId'],
        $_SESSION['userEmail']
    );
    
    session_destroy(); //destroi todas as variavies globais deste site, ou seja a sessão.
    
    header('Location: index.php');
?>