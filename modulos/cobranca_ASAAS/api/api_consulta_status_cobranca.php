<?php

    include("../../../bibliotecas/00-Rotas/01-configuracoes_adm.php");

    $sql = mysqli_query($conn,"SELECT `code` FROM `empresa_boletos` WHERE `barcode`='';");
    
    while($row = mysqli_fetch_array($sql)){
        

        $paymentId = $row[0];
        $url = "https://www.asaas.com/api/v3/payments/" . $paymentId;
        $accessToken = $token_asaas;
    
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("access_token: " . $accessToken));
        $response = curl_exec($ch);
        curl_close($ch);
        
        $obj = json_decode($response);
        
       //echo($response);
        
        $status = $obj->status;
        
         echo($paymentId."-".$status."</br>");
    
        $sql2 = mysqli_query($conn,"UPDATE `empresa_boletos` SET `status` = '".$status."' WHERE `empresa_boletos`.`code` = '".$paymentId."';");
        
        
    }
    
    mysqli_close($sql);


?>