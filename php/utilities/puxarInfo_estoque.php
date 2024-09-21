<?php

    include "mysqlconecta.php";

    $id = $_POST["id"];

    $acao = $_POST["acao"];

    $infos_estoque = mysqli_fetch_array(mysqli_query($conexao, "SELECT nome_produto, qtd_padrao, unidade_medida FROM estoque WHERE id_materiaPrima = '$id'"));

    echo "<div class='row'>
        <div class='col'>
            <small class='form-text align-start mb-1'>
                Nome do produto:
            </small>
        </div>
        <div class='col'>
            <small class='form-text align-start mb-1'>
                Quantidade maxima:
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
            <input class='form-control' type='text' id='nome_prod_$acao' value='$infos_estoque[0]' required>
            <div class='invalid-feedback'>
                Insira um nome.
            </div>
        </div>
        <div class='col'>
            <input class='form-control' type='text' id='qtd_padrao_$acao' oninput='int_js(this.value, this)' value='$infos_estoque[1]' required>
            <div class='invalid-feedback'>
                Insira uma quantidade.
            </div>
        </div>
        <div class='col'>
            <select class='form-select' id='unidade_medida_$acao' aria-label='Default select example' required>
                <option value='kg'>kg</option>
                <option value='g'>g</option>
                <option value='l'>l</option>
                <option value='ml'>ml</option>
                <option value='unidades'>unidade</option>
                <option value='duzias'>duzia</option>
            </select>

            <script>
                document.getElementById('unidade_medida_edit').value = '$infos_estoque[2]'
            </script>
            
            <input type='hidden' value='$id' id='id_$acao'>
            <div class='invalid-feedback'>
                Insira a unidade de medida.
            </div>
        </div>
    </div>";

?>