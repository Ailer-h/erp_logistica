<?php

    include "mysqlconecta.php";

    $id = $_POST['id'];
    $qtd = $_POST['qtd'];

    $nova_qtd = mysqli_fetch_array(mysqli_query($conexao, "select qtd_estoque from estoque where id_materiaPrima = $id"))[0] - $qtd;
    mysqli_query($conexao, "update estoque set qtd_estoque = $nova_qtd where id_materiaPrima = $id");

?>