<?php

    session_start();

    include "mysqlconecta.php";

    $id = $_SESSION['id_empresa'];
    $search = $_POST['search'];

    $query = mysqli_query($conexao, "select nt.id_nota, nt.qtd_produto, est.nome_produto, est.unidade_medida, rg.qtd_recebida, rg.estado_registro, rg.data_registro from registro rg, nota nt, estoque est where rg.id_empresa = 1 and rg.id_nota = nt.id_nota and nt.produto_nota = est.id_materiaPrima and est.nome_produto like '%$search%';");

    while($infos_registro = mysqli_fetch_array($query)){

        $qtd_recebida = $infos_registro[4] != null ? $infos_registro[4] : "---";

        echo "<tr>";

        echo "<td class='align-middle'>$infos_registro[0]</td>";
        echo "<td class='align-middle'>
            $infos_registro[2] - 
            $infos_registro[1] $infos_registro[3]
        </td>";
        echo "<td class='align-middle'>$qtd_recebida</td>";
        echo "<td class='align-middle'>$infos_registro[5]</td>";

        if($infos_registro[5] == 'Requisitado'){

            echo "<td class='d-flex justify-content-evenly g-2'>
                <button type='button' class='btn btn-warning fw-bold' title='Marcar como recebido'>
                    <i class='bi bi-check2-square bold'></i>
                </button>
            </td>";
        }

        echo "</tr>";
    }
?>