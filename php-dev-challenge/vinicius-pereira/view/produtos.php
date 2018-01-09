<?php
require_once "../model/Produto.php";
session_start();
if(isset($_SESSION["produtos"]))
	$produtos = $_SESSION["produtos"];
else{
	header("location: ../controller/ControlProduto.php?action=listar");
	$produtos = $_SESSION["produtos"];
}
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<title>VP - CRUD</title>
	<link rel="stylesheet" href="assets/css/main.css">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/filtro.js"></script>
	<script src="assets/js/modalExcluir.js"></script>
	<script src="assets/js/monetario.js"></script>
	<link rel="stylesheet" href="assets/css/padrao.css">
</head>
<body>
	<?php include "menu.php"; ?>
	<div class="col-md-10 col-md-offset-1">
		<h1 class="title">Produtos</h1>
		<a href="novo_produto.php"><button class="btn btn-default col-md-offset-10 col-md-2" >Novo Produto</button></a>
		<div class="principal">
			<input class="form-control input-lg" id="buscar" alt="table1" placeholder="Buscar..." type="text">
			<table class="table1 table table-hover table-inverse">
				<thead>
					<tr>
						<th class="col-md-2">SKU</th>
						<th class="col-md-5">Nome</th>
						<th class="col-md-3">Preço</th>
						<th class="col-md-2" colspan="2"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($produtos as $p) {?>
					<tr>
						<td class="col-md-2"><?php echo $p->getSKU(); ?></td>
						<td class="busca col-md-5"><?php echo $p->getNome(); ?></td>
						<td class="col-md-3 valor"><?php echo "R$" . number_format($p->getPreco(), 2); ?></td>
						<td class="col-md-2">
							<a href="../controller/ControlProduto.php?action=info&codigo=<?php echo $p->getId(); ?>">
								<button class='btn btn-edit' > 
									<span class='glyphicon glyphicon-info-sign'></span>
								</button>
							</a>
							<a href="../controller/ControlProduto.php?action=carregaEditar&codigo=<?php echo $p->getId(); ?>">
								<button class='btn btn-edit' > 
									<span class='glyphicon glyphicon-edit'></span>
								</button>
							</a>
							<button name="../controller/ControlProduto.php?action=excluir&codigo=<?php echo $p->getId(); ?>" class="btn btn-delete btexcluir" data-toggle="modal" data-target="#modalDelete">
								<span class="glyphicon glyphicon-remove"></span>
							</button>
						</td>
					</tr>
					<?php }?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- Modal Excluir -->
<div id="modalDelete" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Excluir Produto</h4>
			</div>
			<div class="modal-body">
				<p>Tem certeza que deseja excluir este produto?</p>
			</div>
			<div class="modal-footer">
				<a href="" id="Excsim"><button type="button" class="btn btn-yes">Sim</button></a>
				<button type="button" class="btn btn-delete" data-dismiss="modal">Não</button>
			</div>
		</div>

	</div>
</div>
</body>
</html>