<?php
if (!defined("DS")) {
	define('DS', DIRECTORY_SEPARATOR);
}
if (!defined("BASE_DIR")) {
	define('BASE_DIR', dirname(dirname(__FILE__)) . DS);
}
require_once "../model/Pedido.php";
session_start();
if(isset($_SESSION["pedidos"]))
	$pedidos = $_SESSION["pedidos"];
else{
	header("location: ../controller/ControlPedido.php?action=listar");
	$pedidos = $_SESSION["pedidos"];
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
	<link rel="stylesheet" href="assets/css/padrao.css">
</head>
<body>
	<?php include "menu.php"; ?>
	<div class="col-md-10 col-md-offset-1">
		<h1 class="title">Pedidos</h1>
		<a href="../controller/ControlPedido.php?action=carregaNovo"><button class="btn btn-default col-md-offset-10 col-md-2" >Novo Pedido</button></a>
		<div class="principal">
			<input class="form-control input-lg" id="buscar" alt="table1" placeholder="Buscar..." type="text">
			<table class="table1 table table-hover table-inverse">
				<thead>
					<tr>
						<th class="col-md-2">Data</th>
						<th class="col-md-2">Total</th>
						<th class="col-md-6"></th>
						<th class="col-md-2" colspan="2"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($pedidos as $p) {?>
					<tr>
						<td class="busca col-md-2"><?php echo date("d/m/Y", strtotime($p->getData())); ?></td>
						<td class="col-md-2"><?php echo "R$" . number_format($p->getTotal(), 2); ?></td>
						<td class="col-md-6"></td>
						<td class="col-md-2">
							<a href="../controller/ControlPedido.php?action=info&codigo=<?php echo $p->getId(); ?>">
								<button class='btn btn-edit' > 
									<span class='glyphicon glyphicon-info-sign'></span>
								</button>
							</a>
							<a href="../controller/ControlPedido.php?action=carregaEditar&codigo=<?php echo $p->getId(); ?>">
								<button class='btn btn-edit' > 
									<span class='glyphicon glyphicon-edit'></span>
								</button>
							</a>
							<button name="../controller/ControlPedido.php?action=excluir&codigo=<?php echo $p->getId(); ?>" class="btn btn-delete btexcluir" data-toggle="modal" data-target="#modalDelete">
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
				<h4 class="modal-title">Excluir Pedido</h4>
			</div>
			<div class="modal-body">
				<p>Tem certeza que deseja excluir este pedido?</p>
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