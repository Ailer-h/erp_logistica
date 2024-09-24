<?php

    session_start();

    include "mysqlconecta.php";

    $id = $_SESSION['id_empresa'];

    $query = mysqli_query($conexao, "select id_registro,id_nota,qtd_recebida,estado_registro from registro where id_empresa = $id");

    while($infos_registro = mysqli_fetch_array($query)){

        echo "<tr>";

        echo "<td>$infos_registro[0]</td>";
        echo "<td>$infos_registro[1]</td>";
        echo "<td>$infos_registro[2]</td>";
        echo "<td>$infos_registro[3]</td>";

        echo "</tr>";
    }
?>