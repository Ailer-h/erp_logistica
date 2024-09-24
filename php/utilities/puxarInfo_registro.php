<?php

    session_start();

    include "mysqlconecta.php";

    $id_empresa = $_SESSION['id_empresa'];
    $id = $_POST["id"];

    $infos_estoque = mysqli_fetch_array(mysqli_query($conexao, "SELECT est.nome_produto, nt.qtd_produto, nt.data_nota FROM nota nt, registro rg, estoque est WHERE nt.id_nota = rg.id_nota AND nt.produto_nota = est.id_materiaPrima AND rg.id_empresa = $id_empresa"));

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
            <input class='form-control' type='text' id='data_entrega_regis' oninput='int_js(this.value, this)' value='$infos_estoque[2]' disabled>
            
            <input type='hidden' value='$id' id='id_regis'>
        </div>
    </div>";


?>