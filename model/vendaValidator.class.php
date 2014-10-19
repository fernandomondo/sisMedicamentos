<?php

class VendaValidator {

    public function validate($vendaBo) {
    	
    	$erros = array();
    	
    	if(!is_numeric($vendaBo->getNroVenda()))
    		$erro["nroVenda"] = "N�o � um n�mero. Digite novamente!";
    	
    	   	
    	return $erros;    	
    }
}
?>