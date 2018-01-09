<?php
require_once 'Database.php';
require_once BASE_DIR . "model" . DS . "Pedido.php";
require_once BASE_DIR . "model" . DS . "Produto.php";
require_once BASE_DIR . "DAO" . DS . "ProdutoDAO.php";

class PedidoDAO{
	
	public function populaPedido($row){
		$pedido = new Pedido();
		$pedido->setId($row->id_pedido);
		$pedido->setTotal($row->total);
		$pedido->setData($row->data_pedido);
		$pDAO = new ProdutoDAO();
		$pedido->setProdutos($pDAO->buscarProdutoPedido($pedido->getId()));
		return $pedido; 	
	}

	public function buscarPedido($id){
		$db = new Database();
		$con = $db->conexao();
		$query = "SELECT id_pedido, total, data_pedido FROM pedido WHERE id_pedido = ?";
		$rs = $con->prepare($query);
		$rs->bindParam(1, $id);
		if($rs->execute()){
			if($rs->rowCount() > 0){
				$p = $rs->fetch(PDO::FETCH_OBJ);
				return $this->populaPedido($p);
			}
		}
		else
			return null;
	}

	public function listarPedidos(){
		$db = new Database();
		$con = $db->conexao();
		$query = "SELECT id_pedido, total, data_pedido FROM pedido";
		$rs = $con->query($query);
		$pedidos = array();
		while($row = $rs->fetch(PDO::FETCH_OBJ)){
			$pedidos[] = $this->populaPedido($row);
		}
		return $pedidos;
	}

	public function inserePedido($pedido){
		$db = new Database();
		$con = $db->conexao();
		$query = "INSERT INTO pedido(total, data_pedido) VALUES(?, ?)";
		$stmt = $con->prepare($query);
		$total = $pedido->getTotal();
		$stmt->bindParam(1, $total);
		$data = $pedido->getData();
		$stmt->bindParam(2, $data);
		if($stmt->execute()){
			$query = "INSERT INTO produto_pedido(id_produto, id_pedido) VALUES(?, ?)";
			$stmt = $con->prepare($query);
			$idPed = $con->lastInsertId();
			var_dump($idPed);
			foreach($pedido->getProdutos() as $p){
				$idProd = $p->getId();
				$stmt->bindParam(1, $idProd);
				$stmt->bindParam(2, $idPed);
				if(!$stmt->execute())
					return false;
			}
			return true;

		}else
		return false;
	}

	public function excluirPedido($id){
		$db = new Database();
		$con = $db->conexao();
		$query = "DELETE FROM pedido WHERE id_pedido = ?";
		$stmt = $con->prepare($query);
		$stmt->bindParam(1, $id);
		return($stmt->execute());
	}

	public function editarPedido($pedido){
		$db = new Database();
		$con = $db->conexao();
		$query = "UPDATE pedido SET total = ?, data_pedido = ? 	WHERE id_pedido = ?";
		$stmt = $con->prepare($query);
		$total = $pedido->getTotal();
		$stmt->bindParam(1, $total);
		$data = $pedido->getData();
		$stmt->bindParam(2, $data);
		$id = $pedido->getId();
		$stmt->bindParam(3, $id);	
		if($stmt->execute()){
			$idPed = $pedido->getId();
			$query = "DELETE FROM produto_pedido WHERE id_pedido = ?";
			$stmt = $con->prepare($query);
			$stmt->bindParam(1, $idPed);
			$stmt->execute();
			$query = "INSERT INTO produto_pedido(id_produto, id_pedido) VALUES(?, ?)";
			$stmt = $con->prepare($query);	
			foreach($pedido->getProdutos() as $p){
				$idProd = $p->getId();
				$stmt->bindParam(1, $idProd);
				$stmt->bindParam(2, $idPed);
				$stmt->execute();
			}
			return true;
		}else
		return false;	
	}
}
?>