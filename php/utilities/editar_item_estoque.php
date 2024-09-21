<?php

    include "mysqlconecta.php";

    $nome = $_POST['nome'];
    $qtd_padrao = $_POST['qtd_padrao']; 
    $unidade_medida = $_POST['unidade_medida']; 
    $id = $_POST['id'];

    mysqli_query($conexao, "UPDATE estoque SET nome_produto = '$nome', qtd_padrao = '$qtd_padrao', unidade_medida = '$unidade_medida' WHERE id_materiaPrima = '$id'");

    mysqli_close($conexao);

?>