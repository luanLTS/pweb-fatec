<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
</head>

<body>
    <?php verificarLogin(); ?>
</body>

</html>
<?php

    function verificarLogin() {
        session_start();
        $codigo = $_SESSION["codigo"];
        $nome = $_SESSION["nome"];
        if (isset($codigo)) {
            echo "<h1>Ola $nome, seja bem-vindo</h1><br/>";
            echo "<h2>seu código é $codigo</h2><br/>";
        } else {
            header('location: login.php');
        }
    }