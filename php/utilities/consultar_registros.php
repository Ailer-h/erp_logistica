<?php

    session_start();
    include "mysqlconecta.php";
    date_default_timezone_set('America/Sao_Paulo');

    $id = $_SESSION['id_empresa'];
    $search = $_POST['search'];
    $hoje = date("Y-m-d");

    $query = mysqli_query($conexao, "select nt.id_nota, nt.qtd_produto, est.nome_produto, est.unidade_medida, rg.qtd_recebida, rg.estado_registro, rg.data_registro,rg.id_registro, nt.data_nota from registro rg, nota nt, estoque est where rg.id_empresa = $id and rg.id_nota = nt.id_nota and nt.produto_nota = est.id_materiaPrima and est.nome_produto like '%$search%';");

    while($infos_registro = mysqli_fetch_array($query)){

        $qtd_recebida = $infos_registro[4] != null ? $infos_registro[4] . " ". $infos_registro[3] : "---";
        $data_prevista = implode("/", array_reverse(explode("-", $infos_registro[8])));

        $cor_estado = ($infos_registro[6] == "" && $infos_registro[8] < $hoje) || ($infos_registro[6] != "" && $infos_registro[8] < $infos_registro[6]) ? "text-danger fst-italic" : "";

        echo "<tr>";

        echo "<td class='align-middle'>$infos_registro[7]</td>";
        echo "<td class='align-middle'>
            $infos_registro[2] - 
            $infos_registro[1] $infos_registro[3]
        </td>";
        echo "<td class='align-middle'>$qtd_recebida</td>";
        echo "<td class='align-middle $cor_estado'>$data_prevista</td>";
        echo "<td class='align-middle'>$infos_registro[5]</td>";

        if($infos_registro[5] == 'Requisitado'){

            echo "<td class='d-flex justify-content-evenly g-2'>
                <button type='button' class='btn btn-warning fw-bold' onclick='showModalConfirm($infos_registro[7])' title='Marcar como recebido'>
                    <i class='bi bi-check2-square bold'></i>
                </button>
            </td>";

        }else if($infos_registro[5] == 'Em análise'){

            echo "<td class='d-flex justify-content-evenly g-2'>
                <button type='button' class='btn btn-warning fw-bold'  onclick='showModalAnali($infos_registro[7])' title='Analisar'>
                    <i class='bi bi-clipboard-data bold'></i>
                </button>
            </td>";
        
        }else{

            echo "<td class='d-flex justify-content-evenly g-2'>
                <button type='button' class='btn btn-secondary fw-bold'  onclick='showModalAnali($infos_registro[7])' title='Analisar' disabled>
                    <i class='bi bi-clipboard-data bold'></i>
                </button>
            </td>";

        }

        echo "</tr>";
    }
?>