@extends('menu')

@section('menu')

<div class="col-md-10 col-md-offset-1">
  <h1 class="title">Informações - {{$pedido->data_pedido}}</h1>
  <div class="col-md-12">
    <div class="alert alert-danger erro avoid"><strong>Preencha os campos corretamente!</strong></div>
    <h4 class="title">Dados</h4>
    <div class="form-group col-md-3">
      {!!Form::label('data', 'Data:')!!}
      {!!Form::date('data', $pedido->data_pedido, ['class'=>'form-control', 'disabled'=>true])!!}
    </div>
    <div class="form-group col-md-3 col-md-offset-3">
      {!!Form::label('total', 'Total:')!!}
      {!!Form::text('total', "R$" . number_format($pedido->total, 2), ['class'=>'form-control', 'disabled'=>true])!!}
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
@endsection