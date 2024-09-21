<?php

    $id = $_POST['id_materiaPrima'];

    include "mysqlconecta.php";

    $unidade = mysqli_fetch_array(mysqli_query($conexao, "select unidade_medida from estoque where id_materiaPrima = $id"))[0];
    echo $unidade;

    mysqli_close($conexao);

?>