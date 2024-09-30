<?php

    $id = $_POST['id_materiaPrima'];

    include "mysqlconecta.php";

    $infos = mysqli_fetch_array(mysqli_query($conexao, "select unidade_medida, qtd_estoque, qtd_padrao from estoque where id_materiaPrima = $id"));
    $qtd_notas = mysqli_fetch_array(mysqli_query($conexao, "SELECT SUM(qtd_produto) FROM nota WHERE produto_nota = $id AND estado_nota = 'Requisitada';"))[0];
    echo $infos[0];

    $max_nota = $infos[2] - $infos[1] - $qtd_notas > 0 ? $infos[2] - $infos[1] - $qtd_notas: 0;

    echo"<input type='hidden' value='$max_nota' id='max-nota'>";

    mysqli_close($conexao);

?>