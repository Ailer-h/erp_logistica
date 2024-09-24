<?php

    session_start();

    $produto = $_POST['produto'];
    $qtd = $_POST['qtd'];

    //Tratando a data
    $data = implode("-", array_reverse(explode("/", $_POST['data'])));

    $empresa = $_SESSION['id_empresa'];

    include "mysqlconecta.php";

    mysqli_query($conexao, "insert into nota(id_empresa ,produto_nota, qtd_produto, data_nota) values ('$empresa', '$produto', '$qtd', '$data')");
   
    $id_nota = mysqli_fetch_array(mysqli_query($conexao, "select id_nota from nota order by id_nota desc;"))[0];

    mysqli_query($conexao, "insert into registro(id_empresa, id_nota) values ('$empresa','$id_nota');");

    mysqli_close($conexao);

?>