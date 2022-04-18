<?php
    $servidor = 'localhost'; //servidor
    $usuario = 'postgres'; //usuário do seu banco
    $senha = 'teste2'; //senha do seu banco
    $dbname = 'login'; //banco deve ser previamente criado

    //cria a conexão com o banco
    try {
        $conn = new PDO("pgsql:host=$servidor;port=5432;dbname=$dbname", $usuario, $senha);

        // echo "Conexão feita com sucesso!";
    } catch ( PDOException $err ) {
        echo "Falha na conexão com o banco!";

        die($err->getMessage());
    }
?>