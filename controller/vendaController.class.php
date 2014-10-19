<?php

include_once("model/produtoDao.class.php");
include_once("model/vendaDao.class.php");
include_once("model/vendaBo.class.php");
include_once("model/vendaValidator.class.php");

class VendaController {

	private $produtoDao;
	private $vendaDao;

	public function __construct(){
		  	$this->produtoDao = new ProdutoDao();   	
		  	$this->vendaDao = new VendaDao();
	}

   public function executeGet(){  	
   	
 
   	$model = array();
   	$model["errors"] = array(); //no get não tem erros ainda por isso um array vazio
   	 $model["produtos"] = $this->produtoDao->retornarTodos();   	
  
   	  return (object) $model;   	
   }
   
   
    public function executePost(){
   	
   		$venda = new VendaBo();
   		$venda->setCodProduto((int)$_POST["codProduto"]);
	   	$venda->setDesconto((float)$_POST["desconto"]);
	   	$venda->setNroVenda((int)$_POST["nroVenda"]);
	   	$venda->setQuantidade((int)$_POST["quantidade"]);
   		$venda->setValor((float)$_POST["valor"]);
   		
   		$validator = new VendaValidator($this->vendaDao, $this->produtoDao);
   		
   		$errors = $validator->validate($venda);
   			   		
   		if(count($errors) > 0)
   			return (object) array("errors" => $errors,
   								  "venda" => $venda,
   								  "produtos" => $this->produtoDao->retornarTodos());
   		
   		
   		//se chegou aqui � porque n�o tem errors
   		
   		 $this->vendaDao->salvarVenda($venda);
   		 
   		
   		return (object) array("errors" => array(),
   							  "venda" => $venda,
   						      "produtos" => $this->produtoDao->retornarTodos(),
   						      "sucesso" => true,
   						      "total" => $venda->getTotal());
   		
   	
   } 
}
?>