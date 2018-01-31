@extends('menu')

@section('menu')
{!! Form::open(['route'=>['produtos.update', $produto->id], 'method'=>'put']) !!}
  <div class="col-md-10 col-md-offset-1">
    <h1 class="title">Editar Produto</h1>
    <div class="col-md-12">
      <div class="alert alert-danger erro avoid"><strong>Preencha os campos corretamente!</strong></div>
      <h4 class="title">Dados</h4>
      <div class="form-group col-md-12">
        {!!Form::label('nome', 'Nome:')!!}
        {!!Form::text('nome', $produto->nome, ['class'=>'form-control'])!!}
      </div>
      <div class="form-group col-md-4">
        {!!Form::label('sku', 'SKU:')!!}
        {!!Form::text('sku', $produto->sku, ['class'=>'form-control', 'maxlength'=>10])!!}
      </div>
      <div class="form-group col-md-4">
        {!!Form::label('preco', 'Preço:')!!}
        {!!Form::text('preco', 'R$'.number_format($produto->preco, 2), ['class'=>'form-control'])!!}
      </div>

      <div class="form-group col-md-12">
        {!!Form::label('descricao', 'Descrição:')!!}
        {!!Form::textarea('descricao', $produto->descricao, ['class'=>'form-control'])!!}
      </div>
    </div>
  </div>
  <div id="cadastrar" class="col-md-12">
    {!!Form::submit('Salvar', ['class'=>'btn btn-default col-md-offset-5 col-md-2'])!!}
  </div>
{!!Form::close()!!}
<script src="{{asset('js/monetario.js')}}"></script>
<script src="{{asset('js/tratamento.js')}}"></script>
<script src="{{asset('js/valida_produto.js')}}"></script>
@endsection