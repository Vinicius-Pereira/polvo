<?php

namespace TestePolvo;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
	public $timestamps = false;
	protected $fillable = ['sku', 'nome', 'descricao', 'preco'];

    public function pedidos(){
    	return $this->belongsToMany('TestePolvo\Pedido');
    }
}
