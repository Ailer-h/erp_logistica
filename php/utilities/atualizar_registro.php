<?php

    session_start();

    include "mysqlconecta.php";
    date_default_timezone_set('America/Sao_Paulo');

    $id_empresa = $_SESSION['id_empresa'];
    $id = $_POST['id'];
    $estado = $_POST['estado'];
    $data_rec = date("Y-m-d");

    mysqli_query($conexao, "UPDATE registro SET estado_registro = '$estado', data_registro = '$data_rec' WHERE id_registro = $id");

    mysqli_close($conexao);

?>