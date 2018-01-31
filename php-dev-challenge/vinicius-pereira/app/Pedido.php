<?php

namespace TestePolvo;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
	public $timestamps = false;
    protected  $fillable = ['total', 'data_pedido'];

    public function produtos(){
    	return $this->belongsToMany('TestePolvo\Produto', 'produto_pedido', 'id_pedido', 'id_produto');
    }

   
}
