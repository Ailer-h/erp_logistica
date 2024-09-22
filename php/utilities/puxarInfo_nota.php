<?php
session_start();


    include "mysqlconecta.php";

    $id = $_POST["id"];
    $id_empresa = $_SESSION['id_empresa'];

    $infos_nota = mysqli_fetch_array(mysqli_query($conexao, "SELECT produto_nota, qtd_produto,  estado_nota FROM nota nt, estoque est WHERE  id_nota = '$id' AND est.id_empresa = $id_empresa"));

    $nameProd = mysqli_fetch_array(mysqli_query($conexao, "SELECT nome_produto FROM estoque WHERE id_empresa = $id_empresa AND id_materiaPrima = $infos_nota[0]"))[0];


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
                Estado:
            </small>
        </div>
    </div>

    <div class='row'>
        <div class='col'>
            
            <input class='form-control' type='text' id='nome_prod_cancel' oninput='int_js(this.value, this)' value='$nameProd' disabled>
            
        </div>
        <div class='col'>
            <input class='form-control' type='text' id='qtd_requisitada_cancel' oninput='int_js(this.value, this)' value='$infos_nota[1]' disabled>
            
        </div>
        <div class='col'>
            
            <input class='form-control' type='text' id='estado_cancel' oninput='int_js(this.value, this)' value='$infos_nota[2]' disabled>
            
            <input type='hidden' value='$id' id='id_cancel'>
            
        </div>
    </div>";

    
?>