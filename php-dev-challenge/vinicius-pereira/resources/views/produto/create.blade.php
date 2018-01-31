@extends('menu')

@section('menu')
{!! Form::open(['route'=>'produtos.store', 'method'=>'post']) !!}
  <div class="col-md-10 col-md-offset-1">
    <h1 class="title">Novo Produto</h1>
    <div class="col-md-12">
      <div class="alert alert-danger erro avoid"><strong>Preencha os campos corretamente!</strong></div>
      <h4 class="title">Dados</h4>
      <div class="form-group col-md-12">
        {!!Form::label('nome', 'Nome:')!!}
        {!!Form::text('nome', null, ['class'=>'form-control', 'placeholder'=>'Refrigerante Cini Framboesa'])!!}
      </div>
      <div class="form-group col-md-4">
        {!!Form::label('sku', 'SKU:')!!}
        {!!Form::text('sku',  null, ['class'=>'form-control', 'maxlength'=>10, 'placeholder'=>'BRC-1942'])!!}
      </div>
      <div class="form-group col-md-4">
        {!!Form::label('preco', 'Preço:')!!}
        {!!Form::text('preco', null, ['class'=>'form-control', 'placeholder'=>'R$ 5,00'])!!}
      </div>

      <div class="form-group col-md-12">
        {!!Form::label('descricao', 'Descrição:')!!}
        {!!Form::textarea('descricao', null, ['class'=>'form-control', 'placeholder'=>'Refrigerante sabor framboesa.'])!!}
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