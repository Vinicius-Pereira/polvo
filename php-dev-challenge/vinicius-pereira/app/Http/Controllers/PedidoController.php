<?php

namespace TestePolvo\Http\Controllers;

use Illuminate\Http\Request;
use TestePolvo\Pedido;
use TestePolvo\Produto;
use TestePolvo\Http\Requests\PedidoRequest;

class PedidoController extends Controller
{
     public function index(){
        $pedidos = Pedido::paginate(5);
        return view('pedido.index', compact('pedidos'));
    }

    public function create(){
        $produtos = Produto::all();
        return view('pedido.create', compact('produtos'));
    }

    public function info($id){
        $pedido = Pedido::find($id);
        $produtos = Produto::all();
        return view('pedido.info',  compact('pedido', 'produtos'));
    }

    public function store(PedidoRequest $request){
        $pedido = $request->all();
        $pedido['total'] = self::trataValor($pedido['total']);
        $p = Pedido::create($pedido);
        foreach ($pedido['produtos'] as $id) {
            $produto = Produto::find($id);
            $p->produtos()->attach($produto);
        }
        return redirect()->route('pedidos');
    }

    public function edit($id){
        $pedido = Pedido::find($id);
        $produtos = Produto::all();
        return view('pedido.edit', compact('pedido', 'produtos'));
    }

    public function update(PedidoRequest $request, $id){
        $pedido = $request->all();
        $pedido['total'] = self::trataValor($pedido['total']);
        $p = Pedido::find($id)->update($pedido);
        $p = Pedido::find($id);
        $p->produtos()->detach();
        foreach ($pedido['produtos'] as $id) {
            $produto = Produto::find($id);
            $p->produtos()->attach($produto);
        }
        return redirect()->route('pedidos');
    }

    public function destroy($id){
        Pedido::find($id)->produtos()->detach();
        Pedido::find($id)->delete();
        return redirect()->route('pedidos');
    }

    private function trataValor($valor){
        $valor = str_replace("R$", "", $valor);
        $valor = str_replace(".", "", $valor);
        $valor = str_replace(",", ".", $valor);
        return $valor;
    }
}
