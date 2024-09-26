<?php

    include "mysqlconecta.php";

    $id = $_POST["id"];

    $acao = $_POST["acao"];

    $disabled = $acao != "edit" ? "disabled" : "";
    $label_qtd = $acao == "baixa" ? "Em estoque" : "Quantidade maxima";

    $infos_estoque = mysqli_fetch_array(mysqli_query($conexao, "SELECT nome_produto, qtd_padrao, qtd_estoque, unidade_medida FROM estoque WHERE id_materiaPrima = '$id'"));

    $qtd = $acao == "baixa" ? $infos_estoque[2] : $infos_estoque[1];

        echo "<div class='row'>
        <div class='col'>
            <small class='form-text align-start mb-1'>
                Nome do produto:
            </small>
        </div>
        <div class='col'>
            <small class='form-text align-start mb-1'>
                $label_qtd:
            </small>
        </div>
        <div class='col'>
        <small class='form-text align-start mb-1'>
                Unidade de medida:
            </small>
        </div>
    </div>

    <div class='row'>
        <div class='col'>
            <input class='form-control' type='text' id='nome_prod_$acao' value='$infos_estoque[0]' $disabled required>
            <div class='invalid-feedback'>
                Insira um nome.
            </div>
        </div>
        <div class='col'>
            <input class='form-control' type='text' id='qtd_padrao_$acao' oninput='int_js(this.value, this)' value='$qtd' $disabled required>
            <div class='invalid-feedback'>
                Insira uma quantidade.
            </div>
        </div>
        <div class='col'>
            <select class='form-select' id='unidade_medida_$acao' aria-label='Default select example' $disabled required>
                <option value='kg'>kg</option>
                <option value='g'>g</option>
                <option value='l'>l</option>
                <option value='ml'>ml</option>
                <option value='unidades'>unidade</option>
                <option value='duzias'>duzia</option>
            </select>

            <script>
                document.getElementById('unidade_medida_$acao').value = '$infos_estoque[3]'
            </script>
            
            <input type='hidden' value='$id' id='id_$acao'>
            <div class='invalid-feedback'>
                Insira a unidade de medida.
            </div>
        </div>
    </div>";

    if($acao == "baixa"){
        echo"<div class='row'>
            <div class='col'>
                <small class='form-text align-start my-1'>
                    Quantidade enviada:
                </small>
            </div>
        </div>";

        echo"<div class='row'>
            <div class='col'>
                <input class='form-control' type='text' id='qtd_prod_baixa' oninput='int_js(this.value, this)'' required>
                <div class='invalid-feedback'>
                    Insira uma quantidade.
                </div>
            </div>
        </div>";
    }

?>