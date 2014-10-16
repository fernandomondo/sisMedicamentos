<?php

include_once("model/produtoDao.class.php");


class VendaController {

	private $produtoDao;

	public function __construct(){
		  	$this->produtoDao = new ProdutoDao();
   	
	}

   public function executeGet(){  	
   	
 
   	$model = array();
   	
   	 $model["produtos"] = $produtoDao->retornarTodos();   	
  
   	  return (object) $model;   	
   }
   
   
    public function executePost(){
   	
   		$venda = new VendaBo();
   		$venda->setCodProduto($_POST["codProduto"]);
	   	$venda->setDesconto($_POST["desconto"]);
	   	$venda->setNroVenda($_POST["NroVenda"]);
	   	$venda->setQuantidade($_POST["quantidade"]);
   		$venda->setValor($_POST["valor"]);
   		
   		$validator = new VendaValidator();
   		
   		$errors = $validator->validate($venda);
   		
   		
   		if(count($error) > 0)
   			return (object) array("errors" => $errors,
   								  "venda" => $venda,
   								  "produtos" => $this->produtoDao->retornarTodos());
   		
   		
   		//se chegou aqui é porque não tem errors
   		
   		 $this->vendaDao->salvarVenda($venda);
   		 
   		
   		return (object) array("errors" => array(),
   							  "venda" => $venda,
   						      "produtos" => $this->produtoDao->retornarTodos(),
   						      "sucesso" => true,
   						      "total" => $venda->getTotal());
   		
   	
   } 
}
?>