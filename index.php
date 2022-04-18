<?php
    //aqui inicializa a sessão, caso não tenha inicializado ela, não será possivel usar isso nos demais arquivos php.
    //é necessario inicializar a sessão.
	session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="imagens/favicon.ico">
    <title>Exemplo de sistema de login</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>
  </head>
  <body>
    <div class="container">
      <form class="form-signin" method="POST" action="valid.php">

        <h2 class="form-signin-heading">Área Restrita</h2>

        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>

        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha" required>

        <button class="btn btn-lg btn-danger btn-block" type="submit">Acessar</button>
      </form>

        <p class='text-center text-danger'>
            <!-- aqui ficará um mensagem de erro enviada pelo valid.php caso o login não tiver sido efetuado com sucesso. -->
            <?php 
                //esse trecho vai pegar a menssagem do valid.php e exibir dentro da tag p.
                //será feito uma verificação se a sessão está emitindo a variaval loginErro.
                if(isset($_SESSION['loginErro'])) {// se a variavel loginErro for diferente de vazio ela entra no if
                    echo $_SESSION['loginErro']; //ela vai imprimir a menssagem contida na variavel loginErro
                    unset($_SESSION['loginErro']); //nessa parte ela destroi a emissão acima.
                }
            ?>
        </p>

    </div>
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
