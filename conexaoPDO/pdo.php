<html>
<?php listarPDO() ?>

</html>

<?php

function listarPDO()
{
    $conexao = new PDO("mysql:host=localhost; dbname=store", "root", "");
    $conexao->exec("set names utf8");
    $sql = "SELECT * FROM product order by title";
    $stml = $conexao->prepare($sql);
    $stml->execute();
    echo "<select>";
    while ($row = $stml->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        echo ("<option value='$id'>$title</option>");
    }
    echo "</select>";
    $conexao = null;
}
