<?php

session_start();

include "mysqlconecta.php";

$id_empresa = $_SESSION['id_empresa'];
$id = $_POST["id"];
$acao = $_POST["acao"];

$infos_estoque = mysqli_fetch_array(mysqli_query($conexao, "SELECT est.nome_produto, nt.qtd_produto, nt.data_nota, est.unidade_medida FROM nota nt, registro rg, estoque est WHERE nt.id_nota = rg.id_nota AND nt.produto_nota = est.id_materiaPrima AND rg.id_empresa = $id_empresa AND rg.id_registro = $id"));
$date = implode("/", array_reverse(explode("-", $infos_estoque[2])));


if ($acao == "Em analise") {

    echo "<div class='row fs-4'><div class='col'>Nota:</div></div>
            <div class='row'>
            <div class='col'>
                <small class='form-text align-start mb-1'>
                    Nome do produto:
                </small>
            </div>
            <div class='col'>
                <small class='form-text align-start mb-1'>
                    Quantidade pedida:
                </small>
            </div>
            <div class='col'>
                <small class='form-text align-start mb-1'>
                    Data de entrega:
                </small>
            </div>
          </div>
    

    <div class='row'>
        <div class='col'>
        
            <input class='form-control' type='text' id='nome_prod_regis_anali' value='$infos_estoque[0]' disabled>
            
        </div>
        <div class='col'>
            <div class='input-group'>
                <input class='form-control' type='text' id='qtd_pedida_regis_anali' value='$infos_estoque[1] 'oninput='int_js(this.value, this)' disabled>
                <span class='input-group-text' id='span_unidade_medida'>$infos_estoque[3]</span>
            </div>
            <div class='invalid-feedback'>
                Insira uma quantidade.
            </div>
        </div>
        <div class='col'>
            <input class='form-control' type='text' id='data_entrega_regis_anali' oninput='int_js(this.value, this)' value='$date' disabled>
            
            <input type='hidden' value='$id' id='id_regis'>
        </div>
        </div>
    </div>
    <div class='row pt-4 pb-2 fs-4'>
        <div class='col'>
                Quantidade recebida:
        </div>
    </div>

    <div class='row'>
        <div class='col'>
            <div class='input-group'>
                <input class='form-control' type='text' id='qtd_chegada_regis_anali' oninput='int_js(this.value, this)' required>
                <span class='input-group-text' id='span_unidade_medida'>$infos_estoque[3]</span>
            </div>
        </div>
    </div>
    <input type='hidden' value='$id' id='id_regis'>

        ";

} else {

    echo "<div class='row'>
        <div class='col'>
            <small class='form-text align-start mb-1'>
                Nome do produto:
            </small>
        </div>
        <div class='col'>
            <small class='form-text align-start mb-1'>
                Quantidade pedida:
            </small>
        </div>
        <div class='col'>
        <small class='form-text align-start mb-1'>
                Data de entrega:
            </small>
        </div>
    </div>

    <div class='row'>
        <div class='col'>
            <input class='form-control' type='text' id='nome_prod_regis' value='$infos_estoque[0]' disabled>
            
        </div>
        <div class='col'>
            <input class='form-control' type='text' id='qtd_pedida_regis' oninput='int_js(this.value, this)' value='$infos_estoque[1]' disabled>
            
        </div>
        <div class='col'>
            <input class='form-control' type='text' id='data_entrega_regis' oninput='int_js(this.value, this)' value='$date' disabled>
            
            <input type='hidden' value='$id' id='id_regis'>
        </div>
    </div>";
}

?>