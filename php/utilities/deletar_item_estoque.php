<?php

    include "mysqlconecta.php";
    
    $id = $_POST['id'];

    mysqli_query($conexao, "DELETE FROM estoque WHERE id_materiaPrima = '$id'");

    mysqli_close($conexao);

?>