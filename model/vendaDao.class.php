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

public function retornarPorNro($nro){
		$this->find("*"," nroVenda = " . $nro);
		$rows = $this->getRecordSet();
		if (is_array($rows))
		{
			foreach ($rows as $row) {
				$venda = new VendaBo();
		   		$venda->setCodProduto((int)$row["codProduto"]);
			   	$venda->setDesconto((float)$row["desconto"]);
			   	$venda->setNroVenda((int)$row["nroVenda"]);
			   	$venda->setQuantidade((int)$row["quantidade"]);
		   		$venda->setValor((float)$row["valor"]);   		   			
				return $venda;			
			}
		}
		return null;	
	}
	
	
}


?>
