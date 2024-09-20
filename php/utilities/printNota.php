<?php

    include "utilities/mysqlconecta.php";

    $query = mysqli_query($conexao, "SELECT id_nota,produto_nota,qtd_produto,data_nota FROM nota");

    while($infos_nota = mysqli_fetch_array($query)){

        echo "<tr>";

        echo "<td>$infos_nota[0]</td>";
        echo "<td>$infos_nota[1]</td>";
        echo "<td>$infos_nota[2]</td>";
        echo "<td>$infos_nota[3]</td>";

        echo "</tr>";
    }
?>