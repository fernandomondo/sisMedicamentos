<?php


header('Content-Type: text/html; charset=UTF-8'); 

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
	<meta http-equiv="Content-Language" content="pt-BR" />	
	<title>title</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="col-md-6">
			<form action="index.php" method="post">
				<div class="form-group">
					<label for="nroVenda">NroVenda:</label>
					<input type="text" class="form-control" name="nroVenda" id="nroVenda" value="" maxlength="50" required />
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
					<input type="number" step="0.01" class="form-control" name="valor" id="valor" value="" maxlength="10" min="0" required />
				</div>
				<div class="form-group">
					<label for="quantidade">Quantidade:</label>
					<input type="number" step="1" class="form-control" name="quantidade" id="quantidade" value="" maxlength="50" min="0" required />
				</div>
				<div class="form-group">
					<label for="desconto">Desconto:</label>
					<input type="number" step="0.01" class="form-control" name="desconto" id="desconto" value="" maxlength="50" required />
				</div>
				
				<?php if(count($model->errors) > 0) {?>
					<div class="alert alert-warning">
					 	<button type="button" class="close" data-dismiss="alert">×</button>				
						<ul>
						<?php foreach($model->errors as $error){ ?>
							<li><?php echo $error;  ?></li>
						<?php }  ?>
						</ul>
					</div>
				<?php }  ?>
				
				<?php if(isset($model->sucesso)) {?>
					<p class="alert alert-success">
					 	<button type="button" class="close" data-dismiss="alert">×</button>
						Venda salva com sucesso! Valor total da venda: R$ <?php echo (number_format($model->total , 2, ",", "."));?>
					</p>				
				<?php } ?>
				
				<input type="submit" class="btn btn-primary" value="Salvar" />
			</form>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>	
</body>
</html>