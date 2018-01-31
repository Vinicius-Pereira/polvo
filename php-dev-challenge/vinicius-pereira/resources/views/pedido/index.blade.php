@extends('menu')

@section('menu')
<div class="col-md-10 col-md-offset-1">
	<h1 class="title">Pedidos</h1>
	<a href="{{route('pedidos.create')}}"><button class="btn btn-default col-md-offset-10 col-md-2" >Novo Pedido</button></a>
	<div class="principal">
		<input class="form-control input-lg" id="buscar" alt="table1" placeholder="Buscar..." type="text">
		<table class="table1 table table-hover table-inverse">
			<thead>
				<tr>
					<th class="col-md-2">Data</th>
					<th class="col-md-2">Total</th>
					<th class="col-md-6"></th>
					<th class="col-md-2" colspan="2"></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($pedidos as $p)
				<tr>
					<td class="busca col-md-2">{{date("d/m/Y", strtotime($p->data_pedido))}}</td>
					<td class="col-md-2">{{"R$".number_format($p->total, 2)}}</td>
					<td class="col-md-6"></td>
					<td class="col-md-2">
						<a href="{{route('pedidos.info', ['id'=>$p->id])}}">
							<button class='btn btn-edit' > 
								<span class='glyphicon glyphicon-info-sign'></span>
							</button>
						</a>
						<a href="{{route('pedidos.edit', ['id'=>$p->id])}}">
							<button class='btn btn-edit' > 
								<span class='glyphicon glyphicon-edit'></span>
							</button>
						</a>
						<button name="{{route('pedidos.destroy', ['id'=>$p->id])}}" class="btn btn-delete btexcluir" data-toggle="modal" data-target="#modalDelete">
							<span class="glyphicon glyphicon-remove"></span>
						</button>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<div class="col-md-4 col-md-offset-5">
			{{$pedidos->links()}}
		</div>
	</div>
</div>
</div>
<!-- Modal Excluir -->
<div id="modalDelete" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Excluir Pedido</h4>
			</div>
			<div class="modal-body">
				<p>Tem certeza que deseja excluir este pedido?</p>
			</div>
			<div class="modal-footer">
				<a href="" id="Excsim"><button type="button" class="btn btn-yes">Sim</button></a>
				<button type="button" class="btn btn-delete" data-dismiss="modal">Não</button>
			</div>
		</div>

	</div>
</div>
<script src="{{asset('js/filtro.js')}}"></script>
<script src="{{asset('js/modalExcluir.js')}}"></script>
@endsection