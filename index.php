<?php


/*
 * Created on 14/10/2014
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

include_once("controller/vendaController.class.php");

$controller = new VendaController();
$model = null;


if($_SERVER["REQUEST_METHOD"] === "POST")
 	$model = $controller->executePost();
 else
	$model = $controller->executeGet();
?>


<!DOCTYPE>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Language" content="en" />	
	<title>title</title>
</head>
<body>

<form action="index.php" method="post">
	<div class="form-group">
		<label for="nroVenda">Nº Venda:</label>
		<input type="text" class="form-control" name="nroVenda" id="nroVenda" value="" maxlength="50" />
	</div>
	<div class="form-group">
		<label for="codProduto">Produto:</label>
		<select name="codProduto" id="codProduto"  class="form-control">
			<?php foreach($model->produtos as $produto){    ?>
			<option value="<?php echo $produto->getCodProduto();  ?>"><?php echo  $produto->getNome();  ?></option>
			<?php }  ?>
		</select>
	</div>
	
	<div class="form-group">
		<label for="valor">Valor:</label>
		<input type="number" step="0.1" class="form-control" name="valor" id="valor" value="" maxlength="10" min="0" />
	</div>
	<div class="form-group">
		<label for="quantidade">Quantidade:</label>
		<input type="number" step="1" class="form-control" name="quantidade" id="quantidade" value="" maxlength="50" min="0" />
	</div>
	<div class="form-group">
		<label for="desconto">Desconto:</label>
		<input type="number" step="0.1" class="form-control" name="desconto" id="desconto" value="" maxlength="50" />
	</div>
</form>>


</body>
</html>