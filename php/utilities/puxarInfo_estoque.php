<?php

function get_selected_option($option){
    
    if($option == "kg"){
        echo"<option value='kg' selected>kg</option>";
        echo"<option value='g'>g</option>";
        echo"<option value='l'>l</option>";
        echo"<option value='ml'>ml</option>";
        echo"<option value='unidades'>unidade</option>";
        echo"<option value='duzias'>duzia</option>";
        return;
    }

    if($option == "g"){
        echo"<option value='kg'>kg</option>";
        echo"<option value='g' selected>g</option>";
        echo"<option value='l'>l</option>";
        echo"<option value='ml'>ml</option>";
        echo"<option value='unidades'>unidade</option>";
        echo"<option value='duzias'>duzia</option>";
        return;
    }
    
    if($option == "l"){
        echo"<option value='kg'>kg</option>";
        echo"<option value='g'>g</option>";
        echo"<option value='l' selected>l</option>";
        echo"<option value='ml'>ml</option>";
        echo"<option value='unidades'>unidade</option>";
        echo"<option value='duzias'>duzia</option>";
        return;
    }

    if($option == "ml"){
        echo"<option value='kg'>kg</option>";
        echo"<option value='g'>g</option>";
        echo"<option value='l'>l</option>";
        echo"<option value='ml' selected>ml</option>";
        echo"<option value='unidades'>unidade</option>";
        echo"<option value='duzias'>duzia</option>";
        return;
    }

    if($option == "unidades"){
        echo"<option value='kg'>kg</option>";
        echo"<option value='g'>g</option>";
        echo"<option value='l'>l</option>";
        echo"<option value='ml'>ml</option>";
        echo"<option value='unidades' selected>unidade</option>";
        echo"<option value='duzias'>duzia</option>";
        return;
    }

    if($option == "duzias"){
        echo"<option value='kg'>kg</option>";
        echo"<option value='g'>g</option>";
        echo"<option value='l'>l</option>";
        echo"<option value='ml'>ml</option>";
        echo"<option value='unidades'>unidade</option>";
        echo"<option value='duzias' selected>duzia</option>";
        return;
    }

}

    include "mysqlconecta.php";

    $id = $_POST["id"];

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
                                <input class='form-control' type='text' id='nome_prod_edit' value='$infos_estoque[0]' required>
                                <div class='invalid-feedback'>
                                    Insira um nome.
                                </div>
                            </div>
                            <div class='col'>
                                <input class='form-control' type='text' id='qtd_padrao_edit' oninput='int_js(this.value, this)' value='$infos_estoque[1]' required>
                                <div class='invalid-feedback'>
                                    Insira uma quantidade.
                                </div>
                            </div>
                            <div class='col'>
                                <select class='form-select' id='unidade_medida_edit' aria-label='Default select example' required>";

                                    get_selected_option($infos_estoque[2]);

                                echo "</select>
                                <div class='invalid-feedback'>
                                    Insira a unidade de medida.
                                </div>
                            </div>
                        </div>";
?>