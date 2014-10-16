<?php

class VendaValidator {

    public function validate($vendaBo) {
    	
    	$erros = array();
    	
    	if(!is_numeric($vendaBo->getNroVenda()))
    		$erro["nroVenda"] = "Não é um número. Digite novamente!";
    	
    	return $erros;    	
    }
}
?>