<?php
require_once "Database.php";
require_once BASE_DIR . "model" . DS . "Produto.php";


class ProdutoDAO{
	private $db;

	public function populaProduto($row){
		$produto = new Produto();
		$produto->setId($row->id_produto);
		$produto->setSKU($row->sku);
		$produto->setNome($row->nome);
		$produto->setDescricao($row->descricao);
		$produto->setPreco($row->preco);
		return $produto;
	}

	public function buscarProduto($id){
		$db = new Database();
		$con = $db->conexao();
		$query = "SELECT id_produto, sku, nome, descricao, preco FROM produto WHERE id_produto = ?";
		$rs = $con->prepare($query);
		$rs->bindParam(1, $id);
		if($rs->execute()){
			if($rs->rowCount() > 0){
				$p = $rs->fetch(PDO::FETCH_OBJ);
				return $this->populaProduto($p);
			}
		}
		else
			return null;
	}

	public function buscarProdutoPedido($id){
		$db = new Database();
		$con = $db->conexao();
		$query = "SELECT p.id_produto, sku, nome, descricao, preco FROM produto AS p INNER JOIN Produto_Pedido AS pp ON p.id_produto = pp.id_produto WHERE pp.id_pedido = ?";
		$rs = $con->prepare($query);
		$rs->bindParam(1, $id);
		$produtos = array();
		$rs->execute();
		while($row = $rs->fetch(PDO::FETCH_OBJ)){
			$produtos[] = $this->populaProduto($row);
		}
		return $produtos;
	}

	public function listarProdutos(){
		$db = new Database();
		$con = $db->conexao();
		$query = "SELECT id_produto, sku, nome, descricao, preco FROM produto";
		$rs = $con->query($query);
		$produtos = array();
		while($row = $rs->fetch(PDO::FETCH_OBJ)){
			$produtos[] = $this->populaProduto($row);
		}
		return $produtos;
	}

	public function insereProduto($produto){
		$db = new Database();
		$con = $db->conexao();
		$query = "INSERT INTO produto(sku, nome, descricao, preco) VALUES(?, ?, ?, ?)";
		$stmt = $con->prepare($query);
		$sku = $produto->getSKU();
		$stmt->bindParam(1, $sku);
		$nome = $produto->getNome();
		$stmt->bindParam(2, $nome);
		$descricao = $produto->getDescricao();
		$stmt->bindParam(3, $descricao);
		$preco = $produto->getPreco();
		$stmt->bindParam(4, $preco);
		return($stmt->execute());
	}

	public function excluirProduto($id){
		$db = new Database();
		$con = $db->conexao();
		$query = "DELETE FROM produto WHERE id_produto = ?";
		$stmt = $con->prepare($query);
		$stmt->bindParam(1, $id);
		return($stmt->execute());	
	}

	public function editarProduto($produto){
		$db = new Database();
		$con = $db->conexao();
		$query = "UPDATE produto SET sku = ?, nome = ?, descricao = ?, preco = ? WHERE id_produto = ?";
		$stmt = $con->prepare($query);
		echo $produto->getSKU();
		var_dump($produto->getSKU());
		$sku = $produto->getSKU();
		$stmt->bindParam(1, $sku);
		$nome = $produto->getNome();
		$stmt->bindParam(2, $nome);
		$descricao = $produto->getDescricao();
		$stmt->bindParam(3, $descricao);
		$preco = $produto->getPreco();
		$stmt->bindParam(4, $preco);
		$id = $produto->getId();
		$stmt->bindParam(5, $id);
		return($stmt->execute());
	}
}

?>