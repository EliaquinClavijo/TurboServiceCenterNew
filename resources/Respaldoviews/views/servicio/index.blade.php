@extends('layout.layout')

@section('estilos')
<!-- DataTables CSS -->
<script src={{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}></script>
<!-- DataTables Responsive CSS -->
<script src={{ URL::asset('bower_components/datatables-responsive/css/dataTables.responsive.css') }}></script>
@stop

@section('content')


<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header">NUEVO SERVICIO
			<button type="button" class="btn btn-primary" onclick="location.href='/servicio/create'"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</button>
		</h3>

	</div>
</div>
<!-- /row -->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				
			</div>
		
		<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="dataTable_wrapper">
					@if($servicio->isEmpty())
						<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x
						
						</button>
						No se tiene ningun servicio <a href="#" class="alert-link"> Ingrese un nuevo servicio</a>.
						</div>
					@else
						@if(session('mensaje'))
							<div class="alert alert-success">
								<button type="button" class="close"
								data-dismiss="alert" aria-hidden="true">x</button>
								{{ session('mensaje') }}
							</div>
						@endif
					@endif
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>NRO PROFOR</th>
								<th>DNI</th>
								<th>NOMBRES Y APELLIDOS</th>
								<th>FECHA</th>
								<th>MODELO</th>
								<th>MARCA</th>
								<th>NRO RECLA.</th>
								<th>OPERACIONES</th>
							</tr>
						</thead>
						<body>
					
							@foreach($servicio as $a)	
								@for ($i = 0; $i < count($reclamos); $i++)
									@if($reclamos[$i]->servicio_id==$a->id)
										<tr class="odd gradeA" rol="row">
									
											<td><?php echo '<strong style="color:red;">'.$a->id.'</strong>';
												?></td>
											<td><?php echo '<strong style="color:red;">'.$a->cliente_id.'</strong>';
												?></td>
											<td><?php echo '<strong style="color:red;">'.$a->nombre.' '.$a->apellido_pate.' '.$a->apellido_mate.'</strong>'; ?></td>
											<td><?php echo '<strong style="color:red;">'.$a->fecha.'</strong>'; ?></td>
											<td><?php echo '<strong style="color:red;">'.$a->modelo.'</strong>'; ?></td>
											<td><?php echo '<strong style="color:red;">'.$a->marca.'</strong>'; ?></td>
									
											<td><strong style="color:red;">{{$reclamos[$i]->estado}}</strong></td>
											<td>
												<button type="button" onclick="window.open('/servicio/{{ $a->id }}')" ><i class="fa fa-book" aria-hidden="true"></i> Reporte
												</button>
												<button type="button"  onclick="location.href='/servicio/{{ $a->id }}/edit'"><i class="fa fa-pencil-square" aria-hidden="true"></i> Editar
												</button>

												<button type="button"  onclick="location.href='/observaciones/{{ $a->id }}/edit'"><i class="fa fa-search-plus" aria-hidden="true"></i> Observar
												</button>
												<button type="button"  onclick="location.href='/reclamos/{{ $a->id }}/edit'"><i class="fa fa-exclamation" aria-hidden="true"></i> Reclamo
												</button>
											</td>
										</tr>
									
									@endif
									@endfor
							@endforeach
							<?php 
								$array1    = array();
								$array2    = array();
								$resultado = array_diff($array1, $array2);
								foreach ($servicio as $key) {
									array_push ($array1 , $key->id );
								}
								foreach ($reclamos as $key1) {
									array_push ($array2 , $key1->servicio_id);
								}
								$resultado = array_diff($array1, $array2);
							 ?>
							 @foreach($servicio as $a)	
								@foreach($resultado as $dif)	
									@if($dif==$a->id)
										<tr class="odd gradeA" rol="row">
											<td>{{ $a->id }}</td>
											<td>{{ $a->cliente_id }}</td>
											<td>{{ $a->nombre }} {{ $a->apellido_pate }} {{ $a->apellido_mate }}</td>
											<td>{{ $a->fecha }}</td>
											<td>{{ $a->modelo }}</td>
											<td>{{ $a->marca}}</td>
											<td></td>
											<td>	
												<button type="button"  onclick="window.open('/servicio/{{ $a->id }}')"><i class="fa fa-book" aria-hidden="true"></i> Reporte
												</button>
												<button type="button"  onclick="location.href='/servicio/{{ $a->id }}/edit'"><i class="fa fa-pencil-square" aria-hidden="true"></i> Editar
												</button>
												<button type="button"  onclick="location.href='/observaciones/{{ $a->id }}/edit'"><i class="fa fa-search-plus" aria-hidden="true"></i> Observar
												</button>

												<button type="button"  onclick="location.href='/reclamos/{{ $a->id }}/edit'"><i class="fa fa-exclamation" aria-hidden="true"></i> Reclamo
												</button>
											</td>
										</tr>
									
									@endif
									@endforeach
							@endforeach
							
						</body>
						</table>
				</div>
			<!-- /.table-responsiv -->
			</div>
		</div>
	</div>
</div>
@stop

@section('js')
<!-- DataTables JavaScript -->
<script src={{ URL::asset('bower_components/DataTables/media/js/jquery.dataTables.min.js') }}></script>

<script src={{ URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}></script>
@stop

@section('jsope')
<!-- Page-level demo Scripts - tables - Use for reference -->
<script >
	$(document).ready(function () {
		$('#dataTables-example').DataTable({ responsive:true });
		// body...
	});
</script>
@stop