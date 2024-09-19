<?php
    $server = "127.0.0.1";
    $user = "root";
    $password = "";
    $database = "erp_logistica";

    $conexao = mysqli_connect($server,$user,$password,$database) or die ("Problemas para conectar ao banco. Verifique os dados!")

?>