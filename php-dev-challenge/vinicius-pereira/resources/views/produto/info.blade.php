@extends('menu')

@section('menu')
<div class="col-md-10 col-md-offset-1">
  <h1 class="title">Produto - {{$produto->nome}}</h1>
  <div class="col-md-12">
    <h4 class="title">Dados</h4>
    <div class="form-group col-md-12">
      <label for="cep">Nome:</label>
      <input id="nome" type="text" name="nome" class="form-control" placeholder="Refrigerante Cini Framboesa" disabled="true" value="{{$produto->nome}}"/>
    </div>
    <div class="form-group col-md-4">
      <label for="cnpj">SKU:</label>
      <input id="sku" type="text" name="sku" class="form-control" placeholder="BRC-1942" maxlength="10" disabled="true" value="{{$produto->sku}}"/>
    </div>
    <div class="form-group col-md-4">
      <label for="cnpj">Preço:</label>
      <input id="preco" type="text" name="preco" class="form-control" placeholder="R$ 5,00" disabled="true" value="{{$produto->preco}}"/>
    </div>

    <div class="form-group col-md-12">
      <label for="cnpj">Descrição:</label>
      <textarea id="descricao" name="descricao" class="form-control" rows="5" disabled="true">{{$produto->descricao}}</textarea> 
    </div>
  </div>
</div>
@endsection