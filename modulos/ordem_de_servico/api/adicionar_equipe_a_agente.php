<?php


if(empty($_POST['id_usuario'])){}else{
    
    
include("../../../bibliotecas/00-Rotas/00-conexao_bd.php");
    $id_usuario = $_POST['id_usuario'];
    $id_equipe   = $_POST['id_equipe'];
    
    
    $sql = mysqli_query($conn,"SELECT * FROM modulo_ordem_de_servico_equipe_em_usuario WHERE id_usuario='".$id_usuario."'");
    $valida = 0;
    
    while($row = mysqli_fetch_array($sql)){$valida = 1; }
    
    if($valida == 1){
        
        $sql2 = mysqli_query($conn,"UPDATE `modulo_ordem_de_servico_equipe_em_usuario` SET `id_equipe` = '".$id_equipe."' WHERE id_usuario = '".$id_usuario."';");
        mysqli_close($sql2);
        
    }else{
        
        $sql2 = mysqli_query($conn,"INSERT INTO `modulo_ordem_de_servico_equipe_em_usuario` (`id`, `id_usuario`, `id_equipe`) VALUES (NULL, '".$id_usuario."', '".$id_equipe."');");
        
        mysqli_close($sql2);
        
    }
    
    mysqli_close($sql);
    
    
}







?>