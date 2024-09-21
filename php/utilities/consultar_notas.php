<?php

    session_start();

    include "mysqlconecta.php";

    $id = $_SESSION['id_empresa'];
    $search = $_POST['search'];
    $filter = $_POST['filtros'];
    $query = mysqli_query($conexao, "select nt.id_nota,nt.produto_nota,nt.qtd_produto,nt.data_nota, es.unidade_medida, es.nome_produto, nt.estado_nota FROM nota nt, estoque es where nt.id_empresa = 1 and nt.produto_nota = es.id_materiaPrima and es.nome_produto like '%$search%' $filter;");

    while($infos_nota = mysqli_fetch_array($query)){

        $date = implode("/", array_reverse(explode("-", $infos_nota[3])));

        echo "<tr>";

        echo "<td class='align-middle'>$infos_nota[0]</td>";
        echo "<td class='align-middle'>$infos_nota[5]</td>";
        echo "<td class='align-middle'>$infos_nota[2] $infos_nota[4]</td>";
        echo "<td class='align-middle'>$date</td>";
        echo "<td class='align-middle'>$infos_nota[6]</td>";
        echo "<td class='d-flex justify-content-evenly g-2'>
            <button type='button' class='btn btn-warning fw-bold' onclick='showEditModal($infos_estoque[0], \"Edit\")' title='Editar'>
                <i class='bi bi-pencil-fill'></i>
            </button>
        </td>";

        echo "</tr>";
    }
?>