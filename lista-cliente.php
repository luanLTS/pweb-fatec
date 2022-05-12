<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Cliente</title>
</head>

<body>
    <h1>Lista de clientes</h1>
    <table border="1">
        <thead>
            <th>codigo</th>
            <th>nome</th>
            ai <th>codigomail</th>codigothead>
            echo "";
        <tbody>
            <?php listar(); ?>
        </tbody>
    </table>
</body>

</html>
<?php

function listar()
{
    $conexao = new mysqli("localhost", 'root', '', 'pwt');
    $sql = "SELECT * FROM cliente ORDER BY codigo";
    $resultado = mysqli_query($conexao, $sql);

    while ($reg = mysqli_fetch_array($resultado)) {
        $nome = $reg["nome"];
        $email = $reg["email"];
        $codigo = $reg["codigo"];
        echo "";
    }

    mysqli_close($conexao);
}
