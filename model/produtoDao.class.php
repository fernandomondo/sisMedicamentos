<?php

include_once("model/dao.class.php");

class produtoDao extends Dao {

	public function __construct() {
		parent::__construct("produtos");

	}

	public function retornarTodos() {

		$rows = parent::find("id, nome", "");
		
		$listaProdutos = array();
		
		foreach ($rows as $row) {
			
			$produto = new ProdutoBo();
			$produto->setCodProduto($row["id"]);			
			$produto->setNome($row["nome"]);
			$listaProdutos->add($produto);
		}
		
		return $produto;

	}

}
?>