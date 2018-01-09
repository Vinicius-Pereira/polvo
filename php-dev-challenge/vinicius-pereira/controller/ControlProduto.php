<?php
if (!defined("DS")) {
    define('DS', DIRECTORY_SEPARATOR);
}
if (!defined("BASE_DIR")) {
    define('BASE_DIR', dirname(dirname(__FILE__)) . DS);
}
require_once BASE_DIR . "DAO" . DS . "Database.php";
require_once BASE_DIR . "model" . DS . "Produto.php";
require_once BASE_DIR . "DAO" . DS . "ProdutoDAO.php";

$db = new Database();
$con = $db->conexao();
$action = $_GET["action"];
$produto = new Produto();
$pDAO = new ProdutoDAO();
switch($action){
	
	case "listar":
	session_start();
	$_SESSION["produtos"] = $pDAO->listarProdutos();
	$produtos = $pDAO->listarProdutos();
	$url = "location:../view/produtos.php";
	if(isset($_GET["alert"])){
		$url = $url . "?alert=" . $_GET["alert"]; 
	}
	header($url);
	break;

	case "inserir":
	$produto->setSKU(trim(htmlspecialchars($_POST["sku"])));
	$produto->setNome(trim(htmlspecialchars($_POST["nome"])));
	$produto->setDescricao(trim(htmlspecialchars($_POST["descricao"])));
	$valor = trim(htmlspecialchars($_POST["preco"]));
	$valor = str_replace("R$", "", $valor);
	$valor = str_replace(".", "", $valor);
	$valor = str_replace(",", ".", $valor);
	$produto->setPreco($valor);
	if($pDAO->insereProduto($produto)){
		header("location:../controller/ControlProduto.php?action=listar&alert=42");
	}
	else{
		header("location:../controller/ControlProduto.php?action=listar&alert=1");	
	}
	break;

	case "excluir":
	if(isset($_GET["codigo"])){
		$id = $_GET["codigo"];
		if($pDAO->excluirProduto($id))
			$alert = "42";
		else
			$alert = "1";
	}else
		$alert = "1";

	header("location:../controller/ControlProduto.php?action=listar&alert=" . $alert);	
	break;

	case "editar":
	$produto->setId(trim(htmlspecialchars($_POST["id"])));
	$produto->setSKU(trim(htmlspecialchars($_POST["sku"])));
	$produto->setNome(trim(htmlspecialchars($_POST["nome"])));
	$valor = trim(htmlspecialchars($_POST["preco"]));
	$valor = str_replace("R$", "", $valor);
	$valor = str_replace(".", "", $valor);
	$valor = str_replace(",", ".", $valor);
	$produto->setPreco($valor);
	$aux = $_POST["produtos"];
	$produto->setDescricao(trim(htmlspecialchars($_POST["descricao"])));
	if($pDAO->editarProduto($produto))
		$url = "location:../view/produtos.php?alert=42";
	else
		$url = "location:../view/editar_produto.php?alert=1";
	header($url);
	break;

	case "info":
	if(isset($_GET["codigo"])){
		$id = $_GET["codigo"];
		$produto = $pDAO->buscarProduto($id);
		if($produto != null){
			session_start();
			$_SESSION["produto"] = $produto;
			$url = "location: ../view/info_produto.php";
		}
		else
			$url = "location:../controller/ControlProduto.php?action=listar&alert=1";
	}else
		$url = "location:../controller/ControlProduto.php?action=listar&alert=1";
	header($url);		
	break;

	case "carregaEditar":
	if(isset($_GET["codigo"])){
		$id = $_GET["codigo"];
		$produto = $pDAO->buscarProduto($id);
		if($produto != null){
			session_start();
			$_SESSION["produto"] = $produto;
			$url = "location: ../view/editar_produto.php";
		}
		else
			$url = "location:../controller/ControlProduto.php?action=listar&alert=1";
	}else
		$url = "location:../controller/ControlProduto.php?action=listar&alert=1";
	header($url);
	break;
}
?>