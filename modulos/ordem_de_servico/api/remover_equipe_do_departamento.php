<?php


if(empty($_POST['variavel_1'])){}else{
    include("../../../bibliotecas/00-Rotas/00-conexao_bd.php");
    $id_deletar = $_POST['variavel_1'];
    
    $sql = mysqli_query($conn,"DELETE FROM `modulo_ordem_de_servico_equipe_em_departamento` WHERE `id` = '".$id_deletar."'");
    
    mysqli_close($sql);
    
    echo("Deletado com sucesso!".$id_deletar);
    
}


?>