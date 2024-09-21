<?php
session_start();


    include "mysqlconecta.php";

    $id = $_POST["id"];
    $id_empresa = $_SESSION['id_empresa'];
    $infos_nota = mysqli_fetch_array(mysqli_query($conexao, "SELECT produto_nota,qtd_produto, estado_nota FROM nota WHERE id_nota = '$id' AND id_empresa = $id_empresa"));

    $nomeProdEstoque = mysqli_fetch_array(mysqli_query($conexao, "SELECT nome_produto FROM estoque WHERE id_empresa = $id_empresa AND id_materiaPrima = $infos_nota[0]"));

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
            <select class='form-select' id='nome_prod_edit' aria-label='Default select example' required>
            <option value='$infos_nota[0]'>$nomeProdEstoque[0]</option>";
                
                getNamesEstoque($infos_nota[0]);

            echo "</select>
            <div class='invalid-feedback'>
                Insira um nome.
            </div>
        </div>
        <div class='col'>
            <input class='form-control' type='text' id='qtd_requisitada_edit' oninput='int_js(this.value, this)' value='$infos_nota[1]' required>
            <div class='invalid-feedback'>
                Insira um estado.
            </div>
        </div>
        <div class='col'>
            <select class='form-select' id='estado_edit' aria-label='Default select example' required>
                <option value='Requisitada'>Requisitado</option>
                <option value='Atendida'>Atendida</option>
                <option value='Cancelada'>Cancelada</option>
            </select>
            <input type='hidden' value='$id' id='id_edit'>
            <div class='invalid-feedback'>
                Insira a unidade de medida.
            </div>
        </div>
    </div>";


    function getNamesEstoque($id_prod){

        include "mysqlconecta.php";
    
        $id_empresa = $_SESSION['id_empresa'];
    
        $query = mysqli_query($conexao, "select nome_produto, id_materiaPrima from estoque where estado != 'deletado' and id_empresa = $id_empresa AND id_materiaPrima != $id_prod");
        
        while ($produto = mysqli_fetch_array($query)) {
    
            echo "<option value='$produto[1]'>$produto[0]</option>";
    
        }
    
    }
?>