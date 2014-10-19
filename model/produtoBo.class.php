<?php


class ProdutoBo{
	
	
	private $codProduto;
	private $nome;
	
	
	public function getCodProduto(){
		return $this->codProduto;		
	}
	
	public function setCodProduto($codProduto){
		$this->codProduto = $codProduto;
	}
	
	public function getNome(){
		return $this->nome;
	}
	
	public function setNome($nome){
		$this->nome = $nome;
	}
	
}


 ?>
