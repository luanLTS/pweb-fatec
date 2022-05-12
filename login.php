<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login PHP</title>
</head>

<body>

    <h1>Login</h1>
    <?php fazerLogin(); ?>
    <form action="login.php" method="post">
        <label for="email">email</label>
        <input type="email" id="email" name="email" require /><br />
        <label for="senha">senha</label>
        <input type="senha" id="senha" name="senha" require /><br />
        <button name="bt1">Entrar</button>
    </form>

</body>

</html>
<?php
function fazerLogin()
{
    if (isset($_POST["bt1"])) {  // isset verifica se o bt1 foi definido no vetor de parametros do POST
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $conexao = new mysqli("localhost", 'root', '', 'pwt'); // cria uma conexão com o banco, passando o endereco,  usuario, senha e nome do bd
        $sql = "SELECT * FROM cliente WHERE email ='$email' and senha=md5('$senha')"; // cria a query de consulta na tabela de cliente quando o email e senha for igual o passado
        $resultado = mysqli_query($conexao, $sql); // executa uma query, passando ela (query) e a string de conexão com o banco

        if ($registro = mysqli_fetch_array($resultado)) { // o mysqli_fetch_array extrai os registro que retornaram na execucao da query
            session_start();
            $_SESSION["codigo"] = $registro["codigo"];
            $_SESSION["nome"] = $registro["nome"];
            header("location: dashboard.php");
        } else {
            echo "<h4>Email ou senha inválido!</h4>";
        }

        mysqli_close($conexao); // fecha a conexão com o banco de dados que foi aberta anteriormente
    }
}
