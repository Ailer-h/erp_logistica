<?php

    session_start();

    $produto = $_POST['produto'];
    $qtd = $_POST['qtd'];

    //Tratando a data
    $data = implode("-", array_reverse(explode("/", $_POST['data'])));

    $empresa = $_SESSION['id_empresa'];

    include "mysqlconecta.php";

    mysqli_query($conexao, "insert into nota(id_empresa ,produto_nota, qtd_produto, data_nota) values ('$empresa', '$produto', '$qtd', '$data')");

    mysqli_close($conexao);

?>