<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Cliente | CRUD</title>
</head>



<body>
    <div class="container">
        <h1>CRUD Cliente</h1>
        <div class="row">

            <form action="./cliente.php" method="POST">
                codigo: <input type="number" require id="id" name="codigo" /><br />
                nome: <input type="text" require id="nome" name="nome" /><br />
                email: <input type="text" require id="email" name="email" /><br />
                senha: <input type="password" require id="senha" name="senha" /><br /><br />
                <button class="btn btn-primary" name="btnInserir">Inserir</button>
                <button class="btn btn-primary" name="btnBuscar">Buscar</button>
                <button class="btn btn-primary" name="btnAtualizar">Atualizar</button>
                <button class="btn btn-primary" name="btnDeletar">Deletar</button>
            </form>
        </div>
    </div>


    <?php

    if (isset($_POST["btnInserir"])) inserir();
    if (isset($_POST["btnbuscar"])) buscar($_POST["codigo"]);
    if (isset($_POST["btnAtualizar"])) alterar($codigo);
    // if (isset($_POST["btnRemover"])) remover();

    ?>



</body>

<?php

function inserir()
{
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    echo "$nome <br> $email <br> $senha";

    $conexao = new mysqli("localhost", 'root', '', 'pwt');

    $sql = "insert (nome, email, senha) values ('$nome', '$email', md5('$senha')";

    mysqli_query($conexao, $sql);

    mysqli_close($conexao);
}


function buscar($codigo)
{
    $conexao = new mysqli("localhost", 'root', '', 'pwt');

    $sql = "SELECT * FROM cliente where codigo=$codigo";

    $resultado = mysqli_query($conexao, $sql);

    if ($reg = mysqli_fetch_array($resultado)) {
        $nome = $reg["nome"];
        $email = $reg["emial"];
        echo "<script lang='javascript'>";
        echo "nome.value='$nome';";
        echo "email.value='$email';";
        echo "codigo.value='$codigo';";
        echo "<script>";
    } else {
        echo "<h4>Registro não encontrado!!</h4>";
    }

    mysqli_close($conexao);
}

function alterar()
{
    $codigo = $_POST["codigo"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $conexao = new mysqli("localhost", 'root', '', 'pwt');

    $sql = "update cliente set nome=$nome, email=$email, senha=md5('$senha') where codigo=$codigo";

    $resultado = mysqli_query($conexao, $sql);

    if ($reg = mysqli_fetch_array($resultado)) {
        $nome = $reg["nome"];
        $email = $reg["emial"];
        echo "<script lang='javascript'>";
        echo "nome.value='$nome';";
        echo "email.value='$email';";
        echo "codigo.value='$codigo';";
        echo "<script>";
    } else {
        echo "<h4>Registro não encontrado!!</h4>";
    }

    mysqli_close($conexao);
}

function remover()
{
    $codigo = $_POST["codigo"];
    $conexao = new mysqli("localhost", 'root', '', 'pwt');
    $sql = "delete from cliente where codigo=$codigo";
    mysqli_query($conexao, $sql);
    mysqli_close($conexao);
}
?>

</html>