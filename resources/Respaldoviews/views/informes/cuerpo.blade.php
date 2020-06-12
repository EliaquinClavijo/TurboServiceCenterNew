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
				Ingrese los datos del Servicio
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-8">
					<div class="register" align="center">
						<form role="form" method="post" action="/informe/{{@$ide->id}}" autocomplete="false" accept-charset="UTF-8" enctype="multipart/form-data" >
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
									    <th  colspan="3"><h3>Datos del Informe</h3></th>
									  </tr>
									  <tr>
									    <td class="tg-quj4"><label>Numero de proforma :</label></td>
									    <td class="tg-xldj" colspan="2" >
									    	<input type="text" class="form-control" name="id" readonly value="{{@$ide->id}}" >
									    </td>
									  </tr>

									 
									   <tr>
									    <td class="tg-quj4"><label>DNI/RUC :</label></td>
									    <td class="tg-xldj" colspan="2"  >
									    	<input type="text" class="form-control" name="dni" readonly  value="{{@$ide->cliente_id}}">
									    </td>
									  </tr>

									  <tr>
									    <td class="tg-quj4"><label> Nombre :</label></td>
									    <td class="tg-xldj" colspan="2"  >
									    	<input type="text" class="form-control" name="nombre" readonly value="{{@$ide->nombre}}" >
									    </td>
									  </tr>
									  <tr>
									    <td class="tg-quj4"><label> Apellido Paterno :</label></td>
									    <td class="tg-xldj" colspan="2" >
									    	<input type="text" class="form-control" name="apellido_pate" readonly  value="{{@$ide->apellido_pate}}" >
									    </td>
									  </tr>
									  <tr>
									    <td class="tg-quj4"><label> Apellido Materno: </label></td>
									    <td class="tg-xldj" colspan="2" >
									    	<input type="text" class="form-control" name="apellido_mate" readonly  value="{{@$ide->apellido_mate}}">
									    </td>
									  </tr>
									  <tr>
									    <td class="tg-quj4"><label> Turbo: </label></td>
									    <td class="tg-xldj" colspan="2" >
									    	<input type="text" class="form-control" name="turbo" readonly  value="{{@$ide->turbo}}">
									    </td>
									  </tr>
									  <tr>
									    <td class="tg-quj4"><label> Modelo: </label></td>
									    <td class="tg-xldj" colspan="2" >
									    	<input type="text" class="form-control" name="modelo" readonly  value="{{@$ide->modelo}}">
									    </td>
									  </tr>
									  <tr>
									    <td class="tg-quj4"><label> Motor: </label></td>
									    <td class="tg-xldj" colspan="2" >
									    	<input type="text" class="form-control" name="motor" readonly  value="{{@$ide->motor}}">
									    </td>
									  </tr>

									  <tr>
									    <td class="tg-quj4"></td>
									    <td class="tg-xldj" colspan="2">
									    	<label>Actividades Detalladas :<input type="button" class="btn btn-success btn-circle btn-lg" value="+" onclick="crear(this)"></label>
											<fieldset id="field" >	
											    <?php 
													$var1=json_decode(@$info->descripcion);
													$var2=json_decode(@$info->operacion);
													$var31=json_decode(@$info->comentario);
												?>
												@if($var1!=NULL or $var2!=NULL or $var31!=NULL )

													@for ($i = 0; $i < count($var1); $i++)
														<label> Actividad Detallada Guardada {{@$i+1}}: </label>
														<div>
															<label> Descripcion {{@$i+1}}: </label>
														<input type="textarea" class="form-control" name="descripcion_info[]" id="descripcion_info[]" value="{{@$var1[$i]}}">
															<label> Operaccion {{@$i+1}} </label>
															<input type="textarea" class="form-control" name="operacion[]" id="operacion[]" value="{{@$var2[$i]}}">
															<label> Comentario {{@$i+1}} </label>
															<input type="textarea" class="form-control" name="comentario[]" id="comentario[]" value="{{@$var31[$i]}}">

														</div>
													
															
													@endfor
												@endif
											</fieldset>
									    </td>
									  </tr>
									  <script type="text/javascript">
								
 
									icremento =0;
									function crear(obj) {
									  icremento++;
									 
									  field = document.getElementById('field');
									 
									  

									  contenedor = document.createElement('div');
									  contenedor.align = 'left';
									  field.appendChild(contenedor);
									  lbl =document.createElement('label');
									  lbl.innerHTML = 'Actividades Detallada:'+icremento;
					  				  contenedor.appendChild(lbl);

					  				  lbl1 =document.createElement('br');
					  				  contenedor.appendChild(lbl1);
					  				  lbl2 =document.createElement('label');
									  lbl2.innerHTML = 'Descripcion:'+icremento;
					  				  contenedor.appendChild(lbl2);

					  				  input = document.createElement("TEXTAREA");
									  input.name="descripcion_info[]";
									  input.className="form-control";
									  contenedor.appendChild(input);

									  lbl3 =document.createElement('br');
					  				  contenedor.appendChild(lbl3);
					  				  lbl31 =document.createElement('label');
									  lbl31.innerHTML = 'Operacion:'+icremento;
					  				  contenedor.appendChild(lbl31);

									  input1 = document.createElement("TEXTAREA");
									  input1.name="operacion[]";
									  input1.className="form-control";
									  contenedor.appendChild(input1);

									  lbl4 =document.createElement('br');
					  				  contenedor.appendChild(lbl4);
					  				  lbl41 =document.createElement('label');
									  lbl41.innerHTML = 'Comentario Tecnico:'+icremento;
					  				  contenedor.appendChild(lbl41);

									  input2 = document.createElement("TEXTAREA");
									  input2.name="comentario[]";
									  input2.className="form-control";
									  contenedor.appendChild(input2);



									  
									  }
									function borrar(obj) {
									  field = document.getElementById('field');
									  field.removeChild(document.getElementById(obj));
									}
							</script>
							<tr>
								<td class="tg-quj4"></td>
								<td class="tg-xldj" colspan="2">
								<label>Resultados :<input type="button" class="btn btn-success btn-circle btn-lg" value="+" onclick="crear_resultado(this)"></label>
								<fieldset id="field1" >	
									<?php 
										$var3=json_decode(@$info->resultado);
											
									?>
									@if(isset($var3))
									@for ($i = 0; $i < count($var3); $i++)
										<div>
											<label>Resultado Guardado {{@$i+1}} </label>
										<input type="text" class="form-control" name="resultado[]" id="resultado[]" value="{{@$var3[$i]}}">
										</div>
											
									@endfor	
									@endif
											  		  	
								</fieldset>
								</td>
							</tr>
							<script type="text/javascript">
								
 
									incre =0;
									function crear_resultado(obj) {
									  incre++;
									 
									  field = document.getElementById('field1');
									  contenedor = document.createElement('div');
									  contenedor.align = 'left';
									  field.appendChild(contenedor);
									  lbl =document.createElement('label');
									  lbl.innerHTML = 'Resultado Detallado:'+incre;
					  				  contenedor.appendChild(lbl);

					  				  lbl1 =document.createElement('br');
					  				  contenedor.appendChild(lbl1);
					  				  lbl2 =document.createElement('label');
									  lbl2.innerHTML = 'Resultado:'+incre;
					  				  contenedor.appendChild(lbl2);

					  				  input = document.createElement("TEXTAREA");
					  			
									  input.name="resultado[]";
									  input.className="form-control";
									  contenedor.appendChild(input);

									  



									  
									  }
									
							</script>

								<tr>
									<td class="tg-quj4"><label> Recomendaciones: </label></td>
									<td class="tg-xldj" colspan="2" >
									<input type="text" class="form-control" name="recomendaciones" value="{{@$info->recomendaciones}}">
									</td>
								</tr>

								<tr>

									<td class="tg-quj4"><button type="submit"  class="btn btn-success">Guardar</button></td>
									<td class="tg-xldj" colspan="2">
									    
									<button type="reset" class="btn btn-warning">Limpiar</button>
									<button type="button" class="btn btn-danger" onclick="location.href='/informe'">Volver</button></td>
								</tr>

								
									  

									  

								</table>
					    	</div>
					    	

											
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop