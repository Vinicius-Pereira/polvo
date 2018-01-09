<?php
require_once BASE_DIR . "model" . DS . "Produto.php";

class Pedido{
	private $id;
	private $total;
	private $data;
	private $produtos;

	public function setId($id){
		$this->id = $id;
	}

	public function getId(){
		return $this->id;
	}

	public function setTotal($total){
		$this->total = $total;
	}

	public function getTotal(){
		return $this->total;
	}

	public function setData($data){
		$this->data = $data;
	}

	public function getData(){
		return $this->data;
	}

	public function setProdutos($produtos){
		$this->produtos = $produtos;
	}

	public function getProdutos(){
		return $this->produtos;
	}
}
?>