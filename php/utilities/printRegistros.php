<?php

    include "utilities/mysqlconecta.php";

    $query = mysqli_query($conexao, "SELECT id_registro,id_nota,qtd_recebida,estado_registro FROM registro");

    while($infos_registro = mysqli_fetch_array($query)){

        echo "<tr>";

        echo "<td>$infos_registro[0]</td>";
        echo "<td>$infos_registro[1]</td>";
        echo "<td>$infos_registro[2]</td>";
        echo "<td>$infos_registro[3]</td>";

        echo "</tr>";
    }
?>