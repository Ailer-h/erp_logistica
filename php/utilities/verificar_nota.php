<?php

session_start();

include "mysqlconecta.php";

$id = $_POST['id'];
$id_empresa = $_SESSION['id_empresa'];

$qtd_rec = $_POST['qtd_rec'];
$estado = $_POST['estado'];

if ($estado == 'Em estoque') {
    
    mysqli_query($conexao, "UPDATE registro SET estado_registro = '$estado', qtd_recebida = $qtd_rec WHERE id_registro = $id AND id_empresa = $id_empresa");
    
    $infosEstoque = mysqli_fetch_array(mysqli_query($conexao, "SELECT est.qtd_estoque,est.id_materiaPrima FROM nota nt, estoque est, registro rg WHERE rg.id_nota = nt.id_nota AND est.id_materiaPrima = nt.produto_nota AND rg.id_registro = $id;"));
    $id_materiaPrima = $infosEstoque[1];
    $nova_qtd = $infosEstoque[0] + $qtd_rec;

    mysqli_query($conexao, "UPDATE estoque SET qtd_estoque = $nova_qtd WHERE id_materiaPrima = $id_materiaPrima");

} else {

    mysqli_query($conexao, "UPDATE registro SET estado_registro = '$estado' WHERE id_registro = $id AND id_empresa = $id_empresa");

}

?>