<?php 
function validarCpfCnpj($cpf_cnpj) {
    $cpf_cnpj = preg_replace("/[^0-9]/", "", $cpf_cnpj);
    
    if(strlen($cpf_cnpj) == 11) { // CPF
        // Validação do CPF
        if(preg_match('/(\d)\1{10}/', $cpf_cnpj)) { // Verifica se todos os dígitos são iguais
            return 1;
        } else {
            for($t=9;$t<11;$t++) {
                for($d=0,$c=0;$c<$t;$c++) {
                    $d += $cpf_cnpj[$c] * (($t+1)-$c);
                }
                $d = ((10*$d)%11)%10;
                if($cpf_cnpj[$c] != $d) {
                    return 1;
                }
            }
            return 0;
        }
    } elseif(strlen($cpf_cnpj) == 14) { // CNPJ
        // Validação do CNPJ
        if(preg_match('/(\d)\1{13}/', $cpf_cnpj)) { // Verifica se todos os dígitos são iguais
            return 1;
        } else {
            for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
                $soma += $cpf_cnpj[$i] * $j;
                $j = ($j == 2) ? 9 : $j - 1;
            }
            $resto = $soma % 11;
            if ($cpf_cnpj[12] != ($resto < 2 ? 0 : 11 - $resto)) {
                return 1;
            }
            for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
                $soma += $cpf_cnpj[$i] * $j;
                $j = ($j == 2) ? 9 : $j - 1;
            }
            $resto = $soma % 11;
            return ($cpf_cnpj[13] == ($resto < 2 ? 0 : 11 - $resto)) ? 0 : 1;
        }
    } else {
        return 1;
    }
}


?>