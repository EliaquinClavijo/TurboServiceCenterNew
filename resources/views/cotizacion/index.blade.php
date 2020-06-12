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
		<h3 class="page-header">NUEVA COTIZACION
			<button type="button" class="btn btn-primary" onclick="location.href='{{url('/cotizacion/create')}}'"> <i class="fa fa-plus" aria-hidden="true"></i> Nuevo</button>
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
								<th>Nro</th>
								<th>DNI</th>
								<th>NOMBRES Y APELLIDOS</th>
								<th>FECHA</th>
								<th>TURBO</th>
						
								<th>PLACA</th>
							
								<th>OPERACIONES</th>
							</tr>
						</thead>
						<body>
					
							@foreach($servicio as $a)
									<tr class="odd gradeA" rol="row">
									
											<td>{{ $a->id }}</td>
											<td>{{ $a->cliente_id }}</td>
											<td>{{ $a->nombre }} {{ $a->apellido_pate }} {{ $a->apellido_mate }}</td>
											<td>{{ $a->fecha }}</td>
											<td>{{ $a->turbo }}</td>
											<td>{{ $a->placa }}</td>
										
											<td>
												<div class="card">
												<button type="button" class="btn btn-primary" data-toggle="collapse" data-target=<?php  echo "#demo".$a->id;?>>Operaciones</button>
											<div id=<?php  echo "demo".$a->id;?> class="collapse">
												
												<button type="button"  onclick="window.open('/cotizacion/{{ $a->id }}')" ><i class="fa fa-book" aria-hidden="true"></i> Reporte
												</button>

												<button type="button"  onclick="location.href='/cotizacion/{{ $a->id }}/edit'"><i class="fa fa-pencil-square" aria-hidden="true"></i> Editar
												</button>


												<button href="javascript:;" data-toggle="modal" onclick='deleteData({{$a->id}})' data-target="#DeleteModal" class=""><i class="fa fa-trash"></i> Eliminar</button>
												</div>
											</div>
											</td>
											
											

												
											</td>
									</tr>
							
								
							@endforeach
						</body>
						</table>
				</div>
			<!-- /.table-responsiv -->
			</div>
		</div>
	</div>
</div>

  <div id="DeleteModal" class="modal fade text-danger" role="dialog">
   <div class="modal-dialog ">
     <!-- Modal content-->
     <form action="" id="deleteForm" method="post">
         <div class="modal-content">
             <div class="modal-header bg-danger">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title text-center">Confirmacion de Eliminacion</h4>
             </div>
             <div class="modal-body">
                 {{ csrf_field() }}
                 {{ method_field('DELETE') }}
                 <p class="text-center">Realmente desea eliminar ?</p>
             </div>
             <div class="modal-footer">
                 <center>
                     <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                     <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Si, Eliminar</button>
                 </center>
             </div>
         </div>
     </form>
   </div>
  </div>


@stop

@section('js')
<!-- DataTables JavaScript -->
<script src={{ URL::asset('bower_components/DataTables/media/js/jquery.dataTables.min.js') }}></script>

<script type="text/javascript">
     function deleteData(id)
     {
         var id = id;
         var url = '{{ route("cotizacion.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
  </script>


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