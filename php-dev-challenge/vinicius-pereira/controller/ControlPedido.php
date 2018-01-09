<?php
if (!defined("DS")) {
	define('DS', DIRECTORY_SEPARATOR);
}
if (!defined("BASE_DIR")) {
	define('BASE_DIR', dirname(dirname(__FILE__)) . DS);
}
require_once BASE_DIR . "DAO" . DS . "Database.php";
require_once BASE_DIR . "model" . DS . "Produto.php";
require_once BASE_DIR . "model" . DS . "Pedido.php";
require_once BASE_DIR . "DAO" . DS . "PedidoDAO.php";
require_once BASE_DIR . "DAO" . DS . "ProdutoDAO.php";

$db = new Database();
$con = $db->conexao();
$action = $_GET["action"];
$pedido = new Pedido();
$peDAO = new PedidoDAO();
$prDAO = new ProdutoDAO();

switch($action){
	case "listar":
	session_start();
	$_SESSION["pedidos"] = $peDAO->listarPedidos();
	$pedidos = $peDAO->listarPedidos();
	$url = "location:../view/pedidos.php";
	if(isset($_GET["alert"])){
		$url = $url . "?alert=" . $_GET["alert"]; 
	}
	header($url);
	break;

	case "carregaNovo":
	session_start();
	$_SESSION["produtos"] = $prDAO->listarProdutos();
	$url = "location:../view/novo_pedido.php";
	header($url);
	break;

	case "inserir":
	$pedido->setData(trim(htmlspecialchars($_POST["dataPedido"])));
	$valor = trim(htmlspecialchars($_POST["total"]));
	$valor = str_replace("R$", "", $valor);
	$valor = str_replace(".", "", $valor);
	$valor = str_replace(",", ".", $valor);
	$pedido->setTotal($valor);
	$aux = $_POST["produtos"];
	$produtos = array();
	foreach ($aux as $p) {
		$produto = new Produto();
		$produto->setId($p);
		$produtos[] = $produto;
	}
	$pedido->setProdutos($produtos);
	if($peDAO->inserePedido($pedido))
		$url = "location:../controller/ControlPedido.php?action=listar&alert=42";
	else
		$url = "location:../controller/ControlPedido.php?action=listar&alert=1";
	header($url);
	break;

	case "excluir":
	$idPedido = $_GET["codigo"];
	if($peDAO->excluirPedido($idPedido))
		$url="location:../controller/ControlPedido.php?action=listar&alert=42";
	else 
		$url="location:../controller/ControlPedido.php?action=listar&alert=1";
	header($url);
	break;

	case "carregaEditar":
	$idPedido = $_GET["codigo"];
	$pedido = $peDAO->buscarPedido($idPedido);
	session_start();
	$_SESSION["pedido"] = $pedido;
	$_SESSION["produtos"] = $prDAO->listarProdutos();
	if($pedido != null)
		$url="location:../view/editar_pedido.php";
	else 
		$url="location:../controller/ControlPedido.php?action=listar&alert=1";
	header($url);
	break;

	case "editar":
	$pedido->setId($_POST["id"]);
	var_dump($_POST["id"]);
	$pedido->setData(trim(htmlspecialchars($_POST["dataPedido"])));
	$valor = trim(htmlspecialchars($_POST["total"]));
	$valor = str_replace("R$", "", $valor);
	$valor = str_replace(".", "", $valor);
	$valor = str_replace(",", ".", $valor);
	$pedido->setTotal($valor);
	$aux = $_POST["produtos"];
	$aux = $_POST["produtos"];
	$produtos = array();
	foreach ($aux as $p) {
		$produto = new Produto();
		$produto->setId($p);
		$produtos[] = $produto;
	}
	$pedido->setProdutos($produtos);
	if($peDAO->editarPedido($pedido))
		$url = "location:../controller/ControlPedido.php?action=listar&alert=42";
	else
		$url = "location:../controller/ControlPedido.php?action=listar&alert=1";
	header($url);
	break;

	case "info":
	$idPedido = $_GET["codigo"];
	$pedido = $peDAO->buscarPedido($idPedido);
	session_start();
	$_SESSION["pedido"] = $pedido;
	$_SESSION["produtos"] = $prDAO->listarProdutos();
	if($pedido != null)
		$url="location:../view/info_pedido.php";
	else 
		$url="location:../controller/ControlPedido.php?action=listar&alert=1";
	header($url);
	break;	
}
?>