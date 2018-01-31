<?php

namespace TestePolvo\Http\Controllers;

use Illuminate\Http\Request;
use TestePolvo\Produto;
use TestePolvo\Http\Requests\ProdutoRequest;

class ProdutoController extends Controller
{
    public function index(){
    	$produtos = Produto::paginate(5);
    	return view('produto.index', compact('produtos'));
    }

    public function info($id){
    	$produto = Produto::find($id);
    	return view('produto.info', compact('produto'));
    }

    public function create(){
    	return view('produto.create');
    }

    public function store(ProdutoRequest $request){
    	$produto = $request->all();
    	$produto['nome'] = strtoupper($produto['nome']);
    	$produto['preco'] = self::trataValor($produto['preco']);
    	Produto::create($produto);
    	return redirect('produtos');
    }

    public function edit($id){
    	$produto = Produto::find($id);
    	return view('produto.edit', compact('produto'));
    }

    public function update(ProdutoRequest $request, $id){
    	$produto = $request->all();
    	$produto['nome'] = strtoupper($produto['nome']);
    	$produto['preco'] = self::trataValor($produto['preco']);
    	Produto::find($id)->update($produto);
    	return redirect('produtos');
    }

    public function destroy($id){
    	Produto::find($id)->delete();
    	return redirect('produtos');
    }

    private function trataValor($valor){
    	$valor = str_replace("R$", "", $valor);
		$valor = str_replace(".", "", $valor);
		$valor = str_replace(",", ".", $valor);
		return $valor;
    }
}
