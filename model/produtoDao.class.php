<?php

include_once("model/dao.class.php");
include_once("model/produtoBo.class.php");

class produtoDao extends Dao {

	public function __construct() {
		parent::__construct("produtos");

	}

	public function retornarTodos() {

		$qtdLinhas = $this->find("codProduto, nome", "");
		$rows = $this->getRecordSet();
				
		$listaProdutos = array();
		
		foreach ($rows as $row) {			
			$produto = new ProdutoBo();
			$produto->setCodProduto($row["codProduto"]);			
			$produto->setNome($row["nome"]);
			array_push($listaProdutos, $produto);			
		}
		
		return $listaProdutos;

	}

}
?>