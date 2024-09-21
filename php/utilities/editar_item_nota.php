<?php

    include "mysqlconecta.php";

    $produto = $_POST['produto'];
    $qtd_requisitada = $_POST['qtd']; 
    $estado = $_POST['estado']; 
    $id = $_POST['id'];

    mysqli_query($conexao, "UPDATE nota SET produto_nota = '$produto', qtd_produto = '$qtd_requisitada', estado_nota = '$estado' WHERE id_nota = '$id'");

    mysqli_close($conexao);

?>