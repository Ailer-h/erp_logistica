<?php

session_start();
include "mysqlconecta.php";

    $id_empresa = $_SESSION['id_empresa'];
    $id = $_POST['id'];
    $estado = $_POST['estado'];

    mysqli_query($conexao, "UPDATE registro SET estado_registro = '$estado' WHERE id_registro = $id");

    mysqli_close($conexao);

?>