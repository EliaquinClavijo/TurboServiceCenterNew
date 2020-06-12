@extends('layout.layout')

@section('content')
<?php header("Access-Control-Allow-Origin: *"); ?>
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
   background-color: #E7F2FB  ;
   box-shadow: 0 0 20px 0 #000000;
   float:left;
   }

#horizontal3 { zoom: 1; vertical-align: top; font-size: 15px;width: 450px; text-align: center;}

 


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
body:after {
  content: ""; 
  font-size: 15em;  
  color: rgba(52, 166, 214, 0.4);
  z-index: 9999;
 
  display: flex;
  align-items: center;
  justify-content: center;
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
    
  -webkit-pointer-events: none;
  -moz-pointer-events: none;
  -ms-pointer-events: none;
  -o-pointer-events: none;
  pointer-events: none;

  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  -o-user-select: none;
  user-select: none;
}

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
			<div class="panel-heading" >
				Ingrese los datos del Servicio
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-8">
					<div class="register" align="center" >
						<form name="mi_formulario" role="form" method="post" action="/servicio" autocomplete="false" accept-charset="UTF-8" enctype="multipart/form-data" onsubmit="return validateForm()" >
							 <script>
								function validateForm() {
								

								  var x1 = document.forms["mi_formulario"]["dni"].value;
								  var x2 = document.forms["mi_formulario"]["nombre"].value;
								  var x3 = document.forms["mi_formulario"]["nro_celular"].value;
								  var x4 = document.forms["mi_formulario"]["adelanto"].value;
								  var x5 = document.forms["mi_formulario"]["id"].value;
								
								  var x10 = document.forms["mi_formulario"]["costo_total"].value;
								  if (x5 == "" ) {
								   alert("Este campo NRO PROFORMA no puede ir vacio");
								   return false;
								}
								
								  if (x2 == "" ) {
								   alert("Este campo NOMBRE no puede ir vacio");
								   return false;
								}

								
								console.log(icremento);

								  if (!/^([0-9])*$/.test(x5)){
							        alert("El valor " + x5 + " no es un número");
							        document.getElementById('id').value ='';
							        return false;
							      }
								  if (!/^([0-9])*$/.test(x1)){
							        alert("El valor " + x1 + " no es un número");
							        document.getElementById('dni').value ='';
							        return false;
							      }
							      
							      if (!/^([0-9])*$/.test(x3)){
							        alert("El valor " + x3 + " no es un número");
							        document.getElementById('nro_celular').value ='';
							        return false;
							      }
							      if (!/^([0-9])*$/.test(x4)){
							        alert("El valor " + x4 + " no es un número");
							        document.getElementById('adelanto').value ='';
							        return false;
							      }
							      
								  
								  
							      
							      

								}
						</script>
						<script>
 
						    var x;
						      function showUser(str) {
						        
						        if (window.XMLHttpRequest) {
						          // code for IE7+, Firefox, Chrome, Opera, Safari
						          xmlhttp=new XMLHttpRequest();
						        } else { // code for IE6, IE5
						          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
						        }
						        xmlhttp.onreadystatechange=function() {
						          if (this.readyState==4 && this.status==200) {
						            var myObject = JSON.parse(this.responseText);
						          	x=myObject;

						          	datos=JSON.parse(x.data);
						          	//console.log(datos);

						          	if(datos.ruc==null){
						          		var aux=x.data.split("|");
						          		document.getElementById("ape_paterno").value=datos.DatosPerson[0].ApellidoPaterno;
						          		document.getElementById("ape_materno").value=datos.DatosPerson[0].ApellidoMaterno;
						          		document.getElementById("nombre").value=datos.DatosPerson[0].Nombres;
						          	}
						          	else{
						          		document.getElementById("nombre").value=datos.razon_social;
						          		document.getElementById("ape_paterno").value="";
						          		document.getElementById("ape_materno").value="";
						          	}
						          	 
						          	
						            console.log(x);
						          }
						        }
						        xmlhttp.open("GET","/recuperaRuc/"+str,true);
						        xmlhttp.send();
						      }
						  </script>
						  <script>
 
						    var x;
						      function showServicio(str) {
						        
						        if (window.XMLHttpRequest) {
						          // code for IE7+, Firefox, Chrome, Opera, Safari
						          xmlhttp=new XMLHttpRequest();
						        } else { // code for IE6, IE5
						          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
						        }
						        xmlhttp.onreadystatechange=function() {
						          if (this.readyState==4 && this.status==200) {
						            var myObject = JSON.parse(this.responseText);
						          	x=myObject;
						      		console.log(x);
						      		if(x.servicio!=null){
						      			if(x.servicio.id!=""){
						          		document.getElementById("demo").innerHTML = "EL NRO PROF YA EXISTE";
						        		document.getElementById("id").focus();
						        		document.getElementById("id").value = "";
						          		}
							          	
						      		}
						      		else{
							          		document.getElementById("demo").innerHTML = "";

							          	}
						          	
						     
						          }
						        }
						        xmlhttp.open("GET","/recuperarprof/"+str,true);
						        xmlhttp.send();
						      }
						  </script>
							@foreach($errors->all() as $error)
								<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x
									</button>
									{{ $error }}
								</div>
							@endforeach
							<input type="hidden" name="_token" value="{{  csrf_token()  }}">

							<div align="center">
    		
					    		<table  style="undefined;table-layout: fixed; width: 100%">
									<colgroup>
									<col style="width: 35%">
									<col style="width: 10%">
									<col style="width: 55%">
									</colgroup>
									  <tr>
									    <th  colspan="3" align="center"><h3 align="center">Datos del Servicio</h3></th>
									  </tr>
									  <tr>
									  	<?php $nro_pro=(int)$ultimo->id+1; ?>
									    <td class="tg-quj4"><label>Numero de orden :</label></td>
									    <td class="tg-xldj" colspan="2" >
									    	<input type="text" class="form-control" style="width: 150px;"  name="id" id="id" value="{{@$nro_pro}}"  onchange="showServicio(this.value)">
									    	<span id="demo" style="color: red;"></span>
									    </td>
									  </tr>
									  <tr>
									    <td class="tg-quj4"><label>DNI/RUC:</label></td>
									    <td class="tg-xldj" colspan="2"  >
									    	<div id="namedni"></div>
									    	<input type="text" class="form-control" style="width: 150px;" name="dni" id="dni" onchange="showUser(this.value)">
									    </td>

									  </tr>
									   <tr>
							            <td class="tg-quj4"><label>Nombre :</label></td>
							            <td class="tg-xldj" colspan="2"  >
							              <input type="text" class="form-control" name="nombre"  id="nombre">
							            </td>
							          </tr>
							          <tr>
							            <td class="tg-quj4"><label>Apellido Paterno :</label></td>
							            <td class="tg-xldj" colspan="2"  >
							              <input type="text" class="form-control" name="ape_paterno"  id="ape_paterno">
							            </td>
							          </tr>

							          <tr>
							            <td class="tg-quj4"><label>Apellido Materno :</label></td>
							            <td class="tg-xldj" colspan="2"  >
							              <input type="text" class="form-control" name="ape_materno"  id="ape_materno">
							            </td>
							          </tr>

									  <tr>
									    <td class="tg-quj4"><label>Telefono :</label></td>

									    <td class="tg-xldj" colspan="2"  >
									    	<input type="text" class="form-control" style="width: 150px;" name="nro_celular" id="nro_celular">
									    </td>
									  </tr>

									 
									  

									  <tr>
									    <td class="tg-quj4"><label> Fecha de Servicio :</label></td>
									    <td class="tg-xldj" colspan="2" > 
									    	<input type="date" class="form-control" style="width: 150px;"  name="fecha"  value=<?php $fechaActual = date('Y-m-d');
									    																echo $fechaActual;
																										?> >
									    	
									  </tr>

									   <tr>

									    <td class="tg-quj4"><label> Modelo de Turbo :</label></td>
									    <td class="tg-xldj" colspan="2">
			                                	<input type="text" class="typeahead form-control" id="modelo" name="modelo" onchange="loadturbos();" >
									    </td> 
									  </tr>

									  <tr>
									    <td class="tg-quj4"><label>Nro Part :</label> </td>
									    <td class="tg-xldj" colspan="2">
									    	<div class="row">
			                                <div class="col-md-6">
									    	 <input type="text" class=" form-control" id="turbo" name="turbo" onchange="checkInput();">
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
			                                	<input type="text" class="marcatype form-control" id="marca" name="marca"  ></div>
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
			                                	<input type="text" class="motortype form-control" id="motor" name="motor"  ></div>
			                                <div class="col-md-6">
			                                	<select id="select_aer" class="form-control" name="turbosall"  onchange="myFunctionsave1()">
											</select></div>
                            				</div>
									    	
									    	
									    </td>
									  </tr>
									  <tr>
									    <td class="tg-quj4"><label> Placa :</label></td>
									    <td class="tg-xldj" colspan="2">
									    	<input type="text" style="width: 150px;"  class="form-control" name="placa"  >
									    </td>
									  </tr>

									  <tr>
									    <td class="tg-quj4"><label>Observacion :</label></td>
									    <td class="tg-xldj" colspan="2"  >
									    	<div style="margin-bottom: 15px;"></div>
									    	<textarea class="form-control" name="observacion" rows="5" cols="50" ></textarea>
									    </td>
									  </tr>
									  <tr>
									    <td class="tg-quj4"></td>
									    <td class="tg-xldj" colspan="2">
									    	<label>Descripcion :<input type="button" class="btn btn-success btn-circle btn-lg" value="+" onclick="crear(this)"></label>
											<fieldset id="field" >				    	
											</fieldset>
									    </td>
									  </tr>

									  <tr>
									  
									    <td class="tg-quj4"><label style="margin-top: 10px;"> Adelanto :</label></td>
									    <td class="tg-xldj" colspan="2">
									    	<input type="text" class="form-control" style="width: 150px; margin-top: 10px;" name="adelanto" id="adelanto" >
									    </td>

									  </tr>
									  <tr>
									    <td class="tg-quj4"><label style="margin-top: 10px;"> Costo total :</label></td>
									    <td class="tg-xldj" colspan="2">
									    	<input type="text" class="form-control"  style="width: 150px; margin-top: 10px;" name="costo_total" id="costo_total"  >
									    </td>
									  </tr>

									  <tr>
									  	<td class="tg-quj4"><button type="submit" class="btn btn-success">Guardar</button></td>
									  	<td class="tg-xldj" colspan="2">
									    
										<button type="reset" class="btn btn-warning">Limpiar</button>
										<button type="button" class="btn btn-danger" onclick="location.href='/servicio'">Volver</button></td>
									  </tr>

								</table>
					    	</div>
					    	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
							<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
					    	<script type="text/javascript">
						        var path="{{route('autocomplete')}}";
						        $('input.typeahead').typeahead({
						            source:function (query,process) {
						                return $.get(path,{query:name},function (data) {
						                   return process(data);
						                });
						            }
						        });
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
					                url  : "{{ secure_url(route('recuperarturbos')) }}",
					                headers: {
							            'Access-Control-Allow-Origin': '*',
							        },
							        crossDomain: true,
   									
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

						    

								
							<script type="text/javascript">
								
 
									icremento =0;
									function crear(obj) {
									  icremento++;
									  
									  field = document.getElementById('field');
									 
									  

									  contenedor = document.createElement('div');
									 
									  field.appendChild(contenedor);
									  lbl =document.createElement('label');

									   conte1 = document.createElement('div');
									  conte1.className="col-sm-8";
									  field.appendChild(conte1);
									  lbl.innerHTML = 'Descripcion:'+icremento;
					  				  conte1.appendChild(lbl);

					  				 
					  				  select = document.createElement("select");
									  select.name="descripcion[]";
									  select.className="form-control";
									  conte1.appendChild(select);

									  z = document.createElement("option");
									  z.setAttribute("value", "");
									  t = document.createTextNode("NINGUNO");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "VENTA DE TURBO");
									  t = document.createTextNode("VENTA DE TURBO");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "VENTA DE NUCLEO CENTRAL");
									  t = document.createTextNode("VENTA DE NUCLEO CENTRAL");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "VENTA DE KIT DE ACCESORIOS DE TURBO");
									  t = document.createTextNode("VENTA DE KIT DE ACCESORIOS DE TURBO");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "VENTA DE EJE DE TURBO");
									  t = document.createTextNode("VENTA DE EJE DE TURBO");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "VENTA DE COMPRESOR DE TURBO");
									  t = document.createTextNode("VENTA DE COMPRESOR DE TURBO");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "VENTA DE EJE ROTOR");
									  t = document.createTextNode("VENTA DE EJE ROTOR");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "VENTA DE GEOMETRIA VARIABLE");
									  t = document.createTextNode("VENTA DE GEOMETRIA VARIABLE");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "VENTA DE SENSOR DE GEOMETRIA");
									  t = document.createTextNode("VENTA DE SENSOR DE GEOMETRIA");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "VENTA DE CARACOL DE ESCAPE");
									  t = document.createTextNode("VENTA DE CARACOL DE ESCAPE");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "VENTA DE CARACOL DE ADMISION");
									  t = document.createTextNode("VENTA DE CARACOL DE ADMISION");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "VENTA DE VALVULA DE VACIO");
									  t = document.createTextNode("VENTA DE VALVULA DE VACIO");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "BALANCEO DE TURBO");
									  t = document.createTextNode("BALANCEO DE TURBO");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "REPARACION DE TURBO");
									  t = document.createTextNode("REPARACION DE TURBO");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "MANTENIMIENTO DE TURBO");
									  t = document.createTextNode("MANTENIMIENTO DE TURBO");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "DIAGNOSTICO DE TURBO");
									  t = document.createTextNode("DIAGNOSTICO DE TURBO");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "RECTIFICADO DE EJE");
									  t = document.createTextNode("RECTIFICADO DE EJE");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "RECTIFICADO DE NUCLEO");
									  t = document.createTextNode("RECTIFICADO DE NUCLEO");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "COMPROBADO DE TURBO");
									  t = document.createTextNode("COMPROBADO DE TURBO");
									  z.appendChild(t);
									  select.appendChild(z);

									  z = document.createElement("option");
									  z.setAttribute("value", "OTROS");
									  t = document.createTextNode("OTROS");
									  z.appendChild(t);
									  select.appendChild(z);

						
									  conte2 = document.createElement('div');
									  conte2.className="col-sm-4";
									  field.appendChild(conte2);

									  lbl3 =document.createElement('label');
									  lbl3.innerHTML = 'Importe:'+icremento;
					  				  conte2.appendChild(lbl3);

									  importe = document.createElement("input");
									  importe.name="importe[]";
									  importe.className="form-control";
									  conte2.appendChild(importe);

									  
									  }
									function borrar(obj) {
									  field = document.getElementById('field');
									  field.removeChild(document.getElementById(obj));
									}
							</script>
							
							
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop