<?php
class Produto{
	private $id;
	private $sku;
	private $nome;
	private $preco;
	private $descricao;

	public function setId($id){
		$this->id = $id;
	}

	public function getId(){
		return $this->id;
	}

	public function setSKU($sku){
		$this->sku = $sku;
	}

	public function getSKU(){
		return $this->sku;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setPreco($preco){
		$this->preco = $preco;
	}

	public function getPreco(){
		return $this->preco;
	}

	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}

	public function getDescricao(){
		return $this->descricao;
	}
}
?>