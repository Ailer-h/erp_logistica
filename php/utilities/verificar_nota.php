<?php

session_start();

include "mysqlconecta.php";

$id = $_POST['id'];
$id_empresa = $_SESSION['id_empresa'];

date_default_timezone_set('America/Sao_Paulo');
$qtd_rec = $_POST['qtd_rec'];
$estado = $_POST['estado'];
$data = date("Y-m-d");

if ($estado == 'Em estoque') {
    
    mysqli_query($conexao, "UPDATE registro SET estado_registro = '$estado', qtd_recebida = $qtd_rec, data_registro = '$data' WHERE id_registro = $id AND id_empresa = $id_empresa");
    
    $infosEstoque = mysqli_fetch_array(mysqli_query($conexao, "SELECT est.qtd_estoque,est.id_materiaPrima FROM nota nt, estoque est, registro rg WHERE rg.id_nota = nt.id_nota AND est.id_materiaPrima = nt.produto_nota AND rg.id_registro = $id;"));
    $id_materiaPrima = $infosEstoque[1];
    $nova_qtd = $infosEstoque[0] + $qtd_rec;

    mysqli_query($conexao, "UPDATE estoque SET qtd_estoque = $nova_qtd WHERE id_materiaPrima = $id_materiaPrima");

    $id_nota = mysqli_fetch_array(mysqli_query($conexao, "SELECT nt.id_nota FROM nota nt, estoque est, registro rg WHERE rg.id_nota = nt.id_nota AND est.id_materiaPrima = nt.produto_nota AND rg.id_registro = $id;"))[0];
    mysqli_query($conexao, "update nota set estado_nota = 'Atendida' where id_nota = $id_nota");

} else {

    mysqli_query($conexao, "UPDATE registro SET estado_registro = '$estado', qtd_recebida = $qtd_rec WHERE id_registro = $id AND id_empresa = $id_empresa");
    $id_nota = mysqli_fetch_array(mysqli_query($conexao, "SELECT nt.id_nota FROM nota nt, estoque est, registro rg WHERE rg.id_nota = nt.id_nota AND est.id_materiaPrima = nt.produto_nota AND rg.id_registro = $id;"))[0];
    mysqli_query($conexao, "update nota set estado_nota = 'Cancelada' where id_nota = $id_nota;");

}

mysqli_close($conexao);

?>