<?php


if(empty($_POST['id_usuario'])){}else{
    
    
include("../../../bibliotecas/00-Rotas/00-conexao_bd.php");
    $id_usuario = $_POST['id_usuario'];
    $id_cargo   = $_POST['id_cargo'];
    
    
    $sql = mysqli_query($conn,"SELECT * FROM modulo_ordem_de_servico_cargo_do_usuario WHERE id_usuario='".$id_usuario."'");
    $valida = 0;
    
    while($row = mysqli_fetch_array($sql)){$valida = 1; }
    
    if($valida == 1){
        
        $sql2 = mysqli_query($conn,"UPDATE `modulo_ordem_de_servico_cargo_do_usuario` SET `id_cargo` = '".$id_cargo."' WHERE id_usuario = '".$id_usuario."';");
        mysqli_close($sql2);
        
    }else{
        
        $sql2 = mysqli_query($conn,"INSERT INTO `modulo_ordem_de_servico_cargo_do_usuario` (`id`, `id_usuario`, `id_cargo`) VALUES (NULL, '".$id_usuario."', '".$id_cargo."');");
        
        mysqli_close($sql2);
        
    }
    
    mysqli_close($sql);
    
    
}







?>