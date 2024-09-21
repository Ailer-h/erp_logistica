<?php

    include "mysqlconecta.php";
    
    $id = $_POST['id'];

    mysqli_query($conexao, "update estoque set estado = 'deletado' where id_materiaPrima = $id");

    mysqli_close($conexao);

?>