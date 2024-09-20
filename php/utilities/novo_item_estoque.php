<?php

    session_start();

    $nome = $_POST['nome'];
    $qtd_padrao = $_POST['qtd_padrao'];
    $unidade_medida = $_POST['unidade_medida'];
    $id = $_SESSION['id_empresa'];

    include "mysqlconecta.php";

    mysqli_query($conexao, "insert into estoque(id_empresa, nome_produto, qtd_padrao, unidade_medida) values ('$id','$nome','$qtd_padrao','$unidade_medida')");

    mysqli_close($conexao);

?>