@extends('layout.layout')

@section('content')
<style type="">
	.register {
   width: 100%;
   margin: 10px auto;
   padding: 10px;
   border: 7px solid $green-border;
   border-radius: 10px;
   font-family: "Helvetica Neue", Helvetica, 
   Arial, sans-serif;
     color: #444;
   background-color: $back-color; 
   box-shadow: 0 0 20px 0 #000000;
   float:left;
   }

#horizontal3 {display: inline-block; *display: inline; zoom: 1; vertical-align: top; font-size: 15px;width: 450px; text-align: center;}




.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-0x09{background-color:#9b9b9b;text-align:left;vertical-align:top}
.tg .tg-yhdn{background-color:#9698ed;border-color:inherit;text-align:left}



input {
  width: 40%;
}

.tg-quj4{border-color:inherit;text-align:right}
.tg-xldj{border-color:inherit;text-align:left}

</style>
<div class="row">
	<div class="col-lg-12">
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-info">
			<div class="panel-heading">
				Ingrese el Reclamo
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-8">
					<div class="register" align="center">
						<form name="mi_formulario" role="form" method="post" action="/reclamos/{{$ide->id}}" autocomplete="false" accept-charset="UTF-8" enctype="multipart/form-data" onsubmit="return validateForm()" >
						<script>
								function validateForm() {

								  var x1 = document.forms["mi_formulario"]["text"].value; 
								  if (x1 == "" ) {
								    alert("Este campo RECLAMOS no puede ir vacio");
								    return false;
								}   

								}
						</script>
						{!! method_field('PUT')!!}
							@foreach($errors->all() as $error)
								<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x
									</button>
									{{ $error }}
								</div>
							@endforeach
							
							<input type="hidden" name="_token" value="{{  csrf_token()  }}">

							<div  align="center">
    		
					    		<table  style="undefined;table-layout: fixed; width: 100%">
									<colgroup>
									<col style="width: 35%">
									<col style="width: 10%">
									<col style="width: 55%">
									</colgroup>
									  <tr>
									    <th  colspan="3"><h3>Datos del reclamo {{$ide->nombre}} {{$ide->cliente_id}} Motor: {{$ide->motor}} Placa:{{$ide->placa}} </h3></th>
									  </tr>
									  <tr>
									    <td class="tg-quj4"><label>Numero de proforma :</label></td>
									    <td class="tg-xldj" colspan="2" >
									    	<input type="text" class="form-control" name="id" readonly value="{{@$ide->id}}" >
									    </td>
									  </tr>


									  <tr>
									    <td class="tg-quj4"><label>Escriba el Reclamo :</label></td>
									    <td class="tg-xldj" colspan="2"  >
									    	<textarea name="text" id="text" rows="10" cols="30" >{{@$recla->text}}</textarea>
									    </td>
									  </tr>
									  
									 <tr>
									    <td class="tg-quj4"><label> Fecha de Reclamo :</label></td>
									    <td class="tg-xldj" colspan="2" > 
									    	<input type="date" class="form-control" readonly  name="fecha_reclamo" value=<?php $fechaActual = date('Y-m-d');echo $fechaActual;?>>
									    	
									  </tr>
									  <tr>
									    <td class="tg-quj4"><label>Fecha del servicio:</label></td>
									    <td class="tg-xldj" colspan="2"  >
									    	<input type="text" class="form-control" name="fecha" readonly value="{{@$ide->fecha}}" >
									    </td>
									  </tr>

									  <tr>
									    <td class="tg-quj4"><label>Estado del reclamo:</label></td>
									    <td class="tg-xldj" colspan="2"  >
									    	<input type="checkbox" class="form-control"  <?php if (@$recla->estado=="VIGENTE") echo "checked";else if(@$recla->estado=="SOLUCIONADO") echo "deschecked ";else echo "checked  disabled";?>  name="estado" value="VIGENTE"  >
									    </td>
									  </tr>

									  <tr>
									  	<td class="tg-quj4"><button type="submit" class="btn btn-success">Guardar</button></td>
									  	<td class="tg-xldj" colspan="2">
									    
										<button type="reset" class="btn btn-warning">Limpiar</button>
										<button type="button" class="btn btn-danger" onclick="location.href='/reclamos/'">Volver</button></td>
									  </tr>
							
		
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop