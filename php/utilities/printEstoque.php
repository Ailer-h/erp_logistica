<?php

    include "utilities/mysqlconecta.php";

    $query = mysqli_query($conexao, "SELECT id_materiaPrima,nome_produto,qtd_padrao,qtd_estoque FROM estoque");

    function getPercentageShow($n, $total){
        $percent = (100*$n)/$total;

        if($percent > 100){
            return 100;

        }

        return $percent;
    }

    function getPercentageReal($n, $total){
        return round((100*$n)/$total, 2);
    }

    while($infos_estoque = mysqli_fetch_array($query)){

        echo "<tr>";

        echo "<td>$infos_estoque[0]</td>";
        echo "<td>$infos_estoque[1]</td>";
        echo "<td>$infos_estoque[3]</td>";
        echo "<td>".getPercentageReal($infos_estoque[3],$infos_estoque[2])."</td>";

        echo "</tr>";
    }

    mysqli_close($conexao);
?>