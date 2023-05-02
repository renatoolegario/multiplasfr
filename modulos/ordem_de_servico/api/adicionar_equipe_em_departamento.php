<?php


if(empty($_POST['id_equipe'])){}else{
    
include("../../../bibliotecas/00-Rotas/00-conexao_bd.php");
    $id_equipe = $_POST['id_equipe'];
    $id_departamento = $_POST['id_departamento'];
    
    if($id_departamento == ""){echo("Departamento em branco.");}else{
        $sql = mysqli_query($conn,"SELECT * FROM modulo_ordem_de_servico_equipe_em_departamento WHERE id_departamento='".$id_departamento."' and id_equipe = '".$id_equipe."'");
        $valida = 1;
        
        while($row = mysqli_fetch_array($sql)){$valida = 0;}
        
        mysqli_close($sql);
        
        if($valida == 0){echo("Esta equipe já esta neste departamento.");}
        if($valida == 1){
            
            $sql = mysqli_query($conn,"INSERT INTO `modulo_ordem_de_servico_equipe_em_departamento` (`id`, `id_departamento`, `id_equipe`) VALUES (NULL, '".$id_departamento."', '".$id_equipe."');");
            
            mysqli_close($sql);
            
            echo("Adicionado com sucesso.");
        }
    }
    
}


?>