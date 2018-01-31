@extends('menu')

@section('menu')
{!! Form::open(['route'=>['pedidos.update', 'id'=>$pedido->id], 'method'=>'put']) !!}
<div class="col-md-10 col-md-offset-1">
  <h1 class="title">Informações - {{$pedido->data_pedido}}</h1>
  <div class="col-md-12">
    <div class="alert alert-danger erro avoid"><strong>Preencha os campos corretamente!</strong></div>
    <h4 class="title">Dados</h4>
    <div class="form-group col-md-3">
      {!!Form::label('data_pedido', 'Data:')!!}
      {!!Form::date('data_pedido', $pedido->data_pedido, ['class'=>'form-control'])!!}
    </div>
    <div class="form-group col-md-3 col-md-offset-3">
      {!!Form::label('total', 'Total:')!!}
      {!!Form::text('total', "R$" . number_format($pedido->total, 2), ['class'=>'form-control'])!!}
    </div>
    <div class="form-group col-md-3 gasparzinho">
      {!!Form::label('ola', 'Ola:')!!}
      {!!Form::text(null, null, ['class'=>'form-control'])!!}
    </div>
    <h4 class="title">Produtos</h4>
    <div class="form-group col-md-12">
      {!!Form::label('produtos', 'Selecione os produtos (Segure CTRL para selecionar mais de um!):')!!}
      <select multiple class="form-control" id="produtos" name="produtos[]">
        @foreach ($produtos as $p)
        <option value="{{$p->id}}" preco="{{$p->preco}}"
          @foreach($pedido->produtos as $pe) {
          @if($pe->id == $p->id)
          selected 
          @endif
          @endforeach    
          >{{$p->nome}}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
  <div id="cadastrar" class="col-md-12">
    {!!Form::submit('Salvar', ['class'=>'btn btn-default col-md-offset-5 col-md-2'])!!}
  </div>
  {!!Form::close()!!}
  <script src="{{asset('js/monetario.js')}}"></script>
  <script src="{{asset('js/tratamento.js')}}"></script>
  <script src="{{asset('js/valida_pedido.js')}}"></script>
  @endsection