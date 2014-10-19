<?php
class VendaBo {
	
	private $nroVenda;
	private $codProduto;
	private $valor;
	private $quantidade;
	private $desconto;

	public function getNroVenda() {
		return $this->nroVenda;
	}

	public function setNroVenda($nroVenda) {
		$this->nroVenda = $nroVenda;
	}
	
	public function getCodProduto() {
		return $this->codProduto;
	}

	public function setCodProduto($codProduto) {
		$this->codProduto = $codProduto;
	}
	
	public function getValor() {
		return $this->valor;
	}

	public function setValor($valor) {
		$this->valor = $valor;
	}
	
	public function getQuantidade() {
		return $this->quantidade;
	}

	public function setQuantidade($quantidade) {
		$this->quantidade = $quantidade;
	}
	
	public function getDesconto() {
		return $this->desconto;
	}

	public function setDesconto($desconto) {
		$this->desconto = $desconto;
	}
	
	public function getTotal(){
		$total =  $this->getValor() * $this->getQuantidade();
		
		return $total - ($total * $this->getDesconto()); 
	}

}
?>