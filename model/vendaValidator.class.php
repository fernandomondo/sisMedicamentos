<?php

class VendaValidator {

	private $vendaDao;
	private $produtoDao;
	
	public function __construct($vendaDao, $produtoDao){
		$this->vendaDao = $vendaDao;
		$this->produtoDao = $produtoDao;
	}

    public function validate($vendaBo) {
    	
    	$erros = array();
    	
    	if(!is_numeric($vendaBo->getNroVenda()))
    		$erros["nroVenda"] = "N�o � um n�mero. Digite novamente!";
    	    	
    	$vendaExistente = $this->vendaDao->RetornarPorNro($vendaBo->getNroVenda());
    	
    	if($vendaExistente != null)
    		$erros["nroVenda"] = "Já existe uma venda com este número.";
    	    	   	    	
    	return $erros;    	
    }
}
?>