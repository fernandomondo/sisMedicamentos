<?php

include_once("model/dao.class.php");

class VendaDao extends Dao{
	
public function __construct(){
	parent::__construct("vendas");	
}	

public function salvarVenda($venda){
	$values = $venda->getNroVenda() . "," . $venda->getCodProduto() . "," . $venda->getValor() . ","
	. $venda->getQuantidade() . "," . $venda->getDesconto();
		
	$this->insert("nroVenda,codProduto,valor,quantidade,desconto", $values);	
}
	
	
	
}


?>
