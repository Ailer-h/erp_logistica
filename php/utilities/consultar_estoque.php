<?php

    function getPercentageShow($n, $total){
        $percent = (100*$n)/$total;

        if($percent > 100){
            return 100;

        }

        return $percent;
    }

    function getProgressBarColor($percentage){
        if($percentage < 25){
            return "danger";
        }
        
        if($percentage < 50){
            return "warning";
        }

        return "success";

    }

    function getPercentageReal($n, $total){
        return round((100*$n)/$total, 2);
    }
    
    session_start();
    $search = $_POST['search'];
    $empresa = $_SESSION['id_empresa'];
    
    include "mysqlconecta.php";

    $query = mysqli_query($conexao, "select id_materiaPrima,nome_produto,qtd_padrao,qtd_estoque,unidade_medida from estoque where id_empresa = $empresa and nome_produto like '%$search%'");

    while($infos_estoque = mysqli_fetch_array($query)){

        $percentage = getPercentageShow($infos_estoque[3], $infos_estoque[2]);
        $color = getProgressBarColor($percentage);

        echo "<tr>";

        echo "<td>$infos_estoque[0]</td>";
        echo "<td>$infos_estoque[1]</td>";
        echo "<td>$infos_estoque[3] $infos_estoque[4]</td>";
        echo "<td>
            <div class='progress' role='progressbar' style='height: 15px'>
                <div class='progress-bar bg-$color' style='width: $percentage%'></div>
            </div>
        </td>";
        echo "<td class='d-flex justify-content-evenly g-2'>
            <button type='button' class='btn btn-warning fw-bold' title='Deletar'>
                <i class='bi bi-trash3-fill'></i>
            </button>
            <button type='button' class='btn btn-warning fw-bold' title='Editar'>
                <i class='bi bi-pencil-fill'></i>
            </button>
            <button type='button' class='btn btn-warning fw-bold' title='Dar baixa'>
                <i class='bi bi-arrow-down-right-circle bold'></i>
            </button>
        </td>";

        echo "</tr>";
    }

    mysqli_close($conexao);
?>