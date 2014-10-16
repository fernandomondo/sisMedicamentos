<?php

include_once("model/produtoDao.class.php");


class VendaController {

   public function executeGet(){  	
   	
   	$produtoDao = new ProdutoDao();
   	
   	$model = array();
   	
   	 $model["produtos"] = $produtoDao->retornarTodos();   	
  
   	  return (object) $model;   	
   }
   
   
    public function executePost(){
   	
   		
   	
   } 
}
?>