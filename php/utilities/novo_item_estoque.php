<?php

    session_start();

    $nome = $_POST['nome'];
    $qtd_padrao = $_POST['qtd_padrao'];
    $id = $_SESSION['id_empresa'];

    include "mysqlconecta.php";

    mysqli_query($conexao, "insert into estoque(id_empresa, nome_produto, qtd_padrao) values ('$id','$nome','$qtd_padrao')");

    mysqli_close($conexao);

?>