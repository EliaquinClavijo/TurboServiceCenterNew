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
   background-color: #E7F2FB;
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
									    	<input type="text" class="form-control" name="dni" id="dni" value="{{@$ide->cliente_id}}">
									    </td>
									  </tr>

									  <tr>
									    <td class="tg-quj4"><label> Nombre :</label></td>
									    <td class="tg-xldj" colspan="2"  >
									    	<input type="text" class="form-control" name="nombre" id="nombre" value="{{@$ide->cliente->nombre}}" required >
									    </td>
									  </tr>
									  <tr>
									    <td class="tg-quj4"><label> Apellido Paterno :</label></td>
									    <td class="tg-xldj" colspan="2" >
									    	<input type="text" class="form-control" name="ape_paterno" value="{{@$ide->cliente->apellido_pate}}" >
									    </td>
									  </tr>
									  <tr>
									    <td class="tg-quj4"><label> Apellido Materno: </label></td>
									    <td class="tg-xldj" colspan="2" >
									    	<input type="text" class="form-control" name="ape_materno" value="{{@$ide->cliente->apellido_mate}}">
									    </td>
									  </tr>
									  <tr>
									    <td class="tg-quj4"><label>Telefono :</label> </td>
									    <td class="tg-xldj" colspan="2">
									    	<input type="text" class="form-control" name="nro_celular" id="nro_celular" value="{{@$ide->cliente->nro_celular}}" >
									    </td>
									  </tr>
									  <tr>
									    <td class="tg-quj4"><label>Email :</label> </td>
									    <td class="tg-xldj" colspan="2">
									    	<input type="text" class="form-control" name="email" id="email" value="{{@$ide->email}}" >
									    </td>
									  </tr>
									  

									  <tr>
									    <td class="tg-quj4"><label> Fecha de Servicio :</label></td>
									    <td class="tg-xldj" colspan="2" > 
									    	<input type="date" class="form-control" name="fecha"  value="{{@$ide->fecha}}">
									    	
									  </tr>

									   <tr>

									    <td class="tg-quj4"><label> Modelo :</label></td>
									    <td class="tg-xldj" colspan="2">
			                                	<input type="text" class="typeahead form-control" id="modelo" value="{{@$ide->modelo}}" name="modelo" onchange="loadturbos();" >
									    </td>
									  </tr>

									  <tr>
									    <td class="tg-quj4"><label>Turbo :</label> </td>
									    <td class="tg-xldj" colspan="2">
									    	<div class="row">
			                                <div class="col-md-6">
									    	 <input type="text" class=" form-control" id="turbo" name="turbo" value="{{@$ide->turbo}}" onchange="checkInput();">
									    	 </div>
			                                <div class="col-md-6">
			                                	<select id="select_aer2" class="form-control" name="turbosall"  onchange="myFunctionsave3()">
											</select></div>
									    	 </div>
									    </td>
									  </tr>
									 
									  <tr>
									    <td class="tg-quj4"><label> Marca :</label></td>
									    <td class="tg-xldj" colspan="2">
									    	<div class="row">
			                                <div class="col-md-6">
			                                	<input type="text" class="marcatype form-control" id="marca" name="marca" value="{{@$ide->marca}}" ></div>
			                                <div class="col-md-6">
			                                	<select id="select_aer1" class="form-control" name="marcasall"  onchange="myFunctionsave2()">
											</select></div>
                            				</div>
									    	
									    	
									    </td>
									  </tr>
									 
									  <tr>
									    <td class="tg-quj4"><label> Motor :</label></td>
									    <td class="tg-xldj" colspan="2">
									    	<div class="row">
			                                <div class="col-md-6">
			                                	<input type="text" class="motortype form-control" id="motor" name="motor"   value="{{@$ide->motor}}"></div>
			                                <div class="col-md-6">
			                                	<select id="select_aer" class="form-control" name="turbosall"  onchange="myFunctionsave1()">
											</select></div>
                            				</div>
									    	
									    	
									    </td>
									  </tr>
									  <tr>
									    <td class="tg-quj4"><label> Placa :</label></td>
									    <td class="tg-xldj" colspan="2">
									    	<input type="text"  class="form-control" name="placa" value="{{@$ide->placa}}" >
									    </td>
									  </tr>

									
							<script type="text/javascript">
								
 
									incre =0;
									function crear_resultado(obj) {
									  incre++;
									 
									  field = document.getElementById('field1');

									  contenedor = document.createElement('div');
								
									  field.appendChild(contenedor);
									  lbl =document.createElement('label');
									  lbl.style.textAlign = 'center';
									  lbl.innerHTML = 'Resultado Detallado:'+incre;
					  				  contenedor.appendChild(lbl);

					  				  lbl1 =document.createElement('br');
					  				  contenedor.appendChild(lbl1);
					  				  lbl2 =document.createElement('label');
									  lbl2.innerHTML = 'Resultado:'+incre;
					  				  contenedor.appendChild(lbl2);

					  				  input = document.createElement("TEXTAREA");
					  				  input.style.width="50%";
									  input.name="resultado[]";
									  input.className="form-control";
									  input.style.borderColor="#000000";
									  contenedor.appendChild(input);
									  }
									
							</script>
								</table>
								<h3>Actividades detalladas :<input type="button" class="btn btn-success btn-circle btn-lg" value="+" onclick="crear_actividades(this)"></h3>
									<fieldset id="field" >	
										<?php 
											$var1=json_decode(@$info->descripcion);
											$var2=json_decode(@$info->operacion);
											$var31=json_decode(@$info->comentario);
											
						
										?>
										@if($var1!=NULL or $var2!=NULL or $var31!=NULL )
											@for ($i = 0; $i < count($var1); $i++)
												<div class="col-sm-6" >
													<label> Descripcion {{$i+1}}: </label>
													<input type="textarea" class="form-control" style="width: 300px;height: 50px;" name="descripcion_info[]" id="descripcion_info[]" value="{{@$var1[$i]}}">
												</div>	
												<div class="col-sm-3">
													<label> Operacion {{$i+1}}: </label>
													<select name="operacion[]" id="operacion[]" class="form-control">
														<option value="">NINGUNO</option>
														<option value="RECUPERABLE" <?php if (@$var2[$i] == "RECUPERABLE") echo ' selected="selected"'; ?>>RECUPERABLE</option>
														<option value="NO RECUPERABLE" <?php if (@$var2[$i] == "NO RECUPERABLE") echo ' selected="selected"'; ?>>NO RECUPERABLE</option>
													</select>
												</div>	
												<div class="col-sm-3">
													<label> Comentario {{$i+1}}: </label>
													<input type="input" class="form-control" style="width: 110%;height: 50px;" name="comentario[]" id="comentario[]" value="{{@$var31[$i]}}">
												</div>			
											@endfor
										@endif
									</fieldset>
									<script type="text/javascript">
										icremento =0;
									function crear_actividades(obj) {
									  icremento++;
									  
									  field = document.getElementById('field');
									 
									  

									  contenedor = document.createElement('div');

									  conte0 = document.createElement('div');
									  conte0.className="col-sm-4";
									  field.appendChild(conte0);

									  lbl0 =document.createElement('label');
									  lbl0.innerHTML = 'Descripcion:'+icremento;
					  				  conte0.appendChild(lbl0);

					  				  descrip = document.createElement("TEXTAREA");
									  descrip.name="descripcion_info[]";
									  descrip.className="form-control";
									  descrip.style.borderColor="#000000";
									  conte0.appendChild(descrip);


									 
									  field.appendChild(contenedor);

									  lbl =document.createElement('label');
									   conte1 = document.createElement('div');
									  conte1.className="col-sm-4";
									  field.appendChild(conte1);
									  lbl.innerHTML = 'Operacion:'+icremento;
					  				  conte1.appendChild(lbl);

					  				 
					  				  select = document.createElement("select");
									  select.name="operacion[]";
									  select.className="form-control";
									  select.style.borderColor="#000000";
									  conte1.appendChild(select);

									  z = document.createElement("option");
									  z.setAttribute("value", "");
									  t = document.createTextNode("NINGUNO");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "NO RECUPERABLE");
									  t = document.createTextNode("NO RECUPERABLE");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "RECUPERABLE");
									  t = document.createTextNode("RECUPERABLE");
									  z.appendChild(t);
									  select.appendChild(z);

									  

						
									  conte2 = document.createElement('div');
									  conte2.className="col-sm-4";
									  field.appendChild(conte2);

									  lbl3 =document.createElement('label');
									  lbl3.innerHTML = 'Comentario:'+icremento;
					  				  conte2.appendChild(lbl3);

									  comentario = document.createElement("TEXTAREA");
									  comentario.name="comentario[]";
									  comentario.className="form-control";
									  comentario.style.borderColor="#000000";
									  conte2.appendChild(comentario);

									  
									  }
									
									</script>

									<script type="text/javascript">
						    	function recuperaname() {
								 	var value = document.getElementById("dni").value;
								 	$.ajax({
					                url  : "{{ route('recuperardni') }}",
					                type : "GET",
					                data : {
					                    'dni' : value,
					                },
					                success:function(data){
					                   console.log(data);
					                   select = document.getElementById("namedni");
									   select.innerHTML = data["name"]; 
			
					                }
					            });
								}
						    </script>

						    <script type="text/javascript">
						    	function loadturbos() {
								 	var value = document.getElementById("modelo").value;
								 	$.ajax({
					                url  : "{{ route('recuperarturbos') }}",
					                type : "GET",
					                data : {
					                    'name' : value,
					                },
					                success:function(data){
					                   console.log(data); 

					                    // for turbos
					                   select = document.getElementById("select_aer2");
									   select.innerHTML = '';

									  z = document.createElement("option");
									  z.setAttribute("value", "");
									  t = document.createTextNode("Elija el turbo ...");
									  z.appendChild(t);
									  select.appendChild(z);
			
									  for (clave in data){
									  z = document.createElement("option");
									  z.setAttribute("value", data[clave]);
									  t = document.createTextNode(data[clave]);
									  z.appendChild(t);
									  select.appendChild(z);}
					                }
					            });
								}
						    </script>


						    <script type="text/javascript">
						    	function checkInput() {
								 	var value = document.getElementById("turbo").value;
								 	$.ajax({
					                url  : "{{ route('recuperarmarca') }}",
					                type : "GET",
					                data : {
					                    'name' : value,
					                },
					                success:function(data){
					                   console.log(data); 
					            
					                   motors = data["motores"];
					                   marcas = data["marcas"];
					                   //turbos = data["turbos"];
					                   console.log(motors)

					                   // for motores
					                   select = document.getElementById("select_aer");
									   select.innerHTML = '';

									  z = document.createElement("option");
									  z.setAttribute("value", "");
									  t = document.createTextNode("Elija una opcion ...");
									  z.appendChild(t);
									  select.appendChild(z);
			
									  for (clave in motors){
									  	if (!clave==""){
									  z = document.createElement("option");
									  z.setAttribute("value", clave);
									  t = document.createTextNode(clave);
									  z.appendChild(t);
									  select.appendChild(z);}}

									  // for marcas
									  select = document.getElementById("select_aer1");
									   select.innerHTML = '';

									  z = document.createElement("option");
									  z.setAttribute("value", "");
									  t = document.createTextNode("Elija una opcion ...");
									  z.appendChild(t);
									  select.appendChild(z);
			
									  for (clave in marcas){
									  	if (!clave==""){
									  z = document.createElement("option");
									  z.setAttribute("value", clave);
									  t = document.createTextNode(clave);
									  z.appendChild(t);
									  select.appendChild(z);}}
					                   
					                  // for modelos
					                //   select = document.getElementById("select_aer2");
									//   select.innerHTML = '';

									 // z = document.createElement("option");
									 // z.setAttribute("value", "");
									 // t = document.createTextNode("Elija una opcion ...");
									 // z.appendChild(t);
									 // select.appendChild(z);
			
									 // for (clave in modelos){
									  //z = document.createElement("option");
									  //z.setAttribute("value", clave);
									  //t = document.createTextNode(clave);
									  //z.appendChild(t);
									  //select.appendChild(z);}
					                }
					            });
								}
						    </script>

						    <script>
							function myFunctionsave1() {
							  var x = document.getElementById("select_aer").value;
							  document.getElementById('motor').value=x;
							}
							</script>

						    <script>
							function myFunctionsave2() {
							  var x = document.getElementById("select_aer1").value;
							  document.getElementById('marca').value=x;
							}
							</script>

						    <script>
							function myFunctionsave3() {
							  var x = document.getElementById("select_aer2").value;
							  document.getElementById('turbo').value=x;
							  checkInput();
							}
							</script>
									

									<label>Resultados :<input type="button" class="btn btn-success btn-circle btn-lg" value="+" onclick="crear_resultado(this)"></label>
									<fieldset id="field1" >	
										<?php 
											$var3=json_decode(@$info->resultado);	
										?>
										@if(isset($var3))
										@for ($i = 0; $i < count($var3); $i++)
											<div align="center">
												<label>Resultado Guardado {{@$i+1}} </label>
											<input type="text" class="form-control" style="width: 50%;height: 50px;" name="resultado[]" id="resultado[]" value="{{@$var3[$i]}}">
											</div>
												
										@endfor	
										@endif  		  	
									</fieldset>
									<div align="center">
									<label> Recomendaciones:<input type="textarea" class="form-control" style="width: 100%;height: 50px;" name="recomendaciones" value="{{@$info->recomendaciones}}"> </label>
									</div>

									<div  align="center">
										<button type="submit"  class="btn btn-success">Guardar</button>
										<button type="reset" class="btn btn-warning">Limpiar</button>
										<button type="button" class="btn btn-danger" onclick="location.href='/informe'">Volver</button></td>
									</div>
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