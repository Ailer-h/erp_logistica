<?php

    include "mysqlconecta.php";

    $id = $_POST['id'];

    mysqli_query($conexao, "UPDATE nota SET estado_nota = 'Cancelada' WHERE id_nota = '$id'");

    mysqli_query($conexao, "DELETE FROM registro WHERE id_nota = $id ");

    mysqli_close($conexao);

?>