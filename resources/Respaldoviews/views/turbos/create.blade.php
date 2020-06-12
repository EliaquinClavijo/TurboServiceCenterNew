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
				Ingrese los datos del Turbo
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-12">
					<div class="register" align="center" >
						<form name="mi_formulario" role="form" method="post" action="/turbos" autocomplete="false" accept-charset="UTF-8" enctype="multipart/form-data" onsubmit="return validateForm()" >
					
							@foreach($errors->all() as $error)
								<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x
									</button>
									{{ $error }}
								</div>
							@endforeach
							

				            
							<h3>Agregar nuevo turbo</h3>
									


							<input type="hidden" name="_token" value="{{  csrf_token()  }}">

							<div align="center">
							<div class="row">
							<div class="col-lg-4"></div>
    						<div class="col-lg-4">

								<div class="form-group">
									<div class="">
                                            <label>Ingrese el turbo</label>
                                            <input  name="idturbo" id="idturbo" class="form-control" placeholder="Ingrese el turbo">
                                    </div>
                                 </div>
                            </div>
                        	</div>
							<div class="row">
    						<div class="col-lg-4">
					    		<table  style="undefined;table-layout: fixed; width: 100%">
									<colgroup>
									<col style="width: 35%">
									<col style="width: 10%">
									<col style="width: 55%">
									</colgroup>
				
									  <tr>
									    <td class="tg-quj4"></td>
									    <td class="tg-xldj" colspan="2">
									    	<label>Nueva Marca :<input type="button" class="btn btn-success btn-circle btn-lg" value="+" onclick="crear(this)"></label>
											<fieldset id="field" >				    	
											</fieldset>
									    </td>
									  </tr>		  

								</table>
							</div>
							<div class="col-lg-4">
					    		<table  style="undefined;table-layout: fixed; width: 100%">
									<colgroup>
									<col style="width: 35%">
									<col style="width: 10%">
									<col style="width: 55%">
									</colgroup>

									  <tr>
									    <td class="tg-quj4"></td>
									    <td class="tg-xldj" colspan="2">
									    	<label>Nuevo Modelo :<input type="button" class="btn btn-success btn-circle btn-lg" value="+" onclick="crear1(this)"></label>
											<fieldset id="field1" >				    	
											</fieldset>
									    </td>
									  </tr>
								</table>
							</div>
							<div class="col-lg-4">
					    		<table  style="undefined;table-layout: fixed; width: 100%">
									<colgroup>
									<col style="width: 35%">
									<col style="width: 10%">
									<col style="width: 55%">
									</colgroup>

									  <tr>
									    <td class="tg-quj4"></td>
									    <td class="tg-xldj" colspan="2">
									    	<label>Nuevo Motor :<input type="button" class="btn btn-success btn-circle btn-lg" value="+" onclick="crear2(this)"></label>
											<fieldset id="field2" >				    	
											</fieldset>
									    </td>
									  </tr>
								</table>
							</div>
						</div>
						<table>
							<tr>

									  	<td class="tg-quj4">
									  		<br>
									  		<button type="submit" class="btn btn-success">Guardar</button></td>
									  	<td class="tg-xldj" colspan="2">
									  		<br>

										<button type="reset" class="btn btn-warning">Limpiar</button>
										<button type="button" class="btn btn-danger" onclick="location.href='/turbos'">Volver</button></td>
									  </tr>
						</table>
					    	</div>

								
							<script type="text/javascript">
								
 
									icremento =0;
									function crear(obj) {
									  icremento++;
									 
									  field = document.getElementById('field');
									  contenedor = document.createElement('div');
									  contenedor.align = 'left';
									  field.appendChild(contenedor);
									  lbl =document.createElement('label');
									  lbl.innerHTML = 'Marca:'+icremento;
					  				  contenedor.appendChild(lbl);

					  				  select = document.createElement("input");
									  select.name="marcas[]";
									  select.className="form-control";
									  contenedor.appendChild(select);
									  }

									 icremento1 =0;
									  function crear1(obj) {
									  icremento1++;
									 
									  field = document.getElementById('field1');
									  contenedor = document.createElement('div');
									  contenedor.align = 'left';
									  field.appendChild(contenedor);
									  lbl =document.createElement('label');
									  lbl.innerHTML = 'Modelo:'+icremento1;
					  				  contenedor.appendChild(lbl);

					  				  select = document.createElement("input");
									  select.name="modelos[]";
									  select.className="form-control";
									  contenedor.appendChild(select);
									  }

									  icremento2 =0;
									  function crear2(obj) {
									  icremento2++;
									 
									  field = document.getElementById('field2');
									  contenedor = document.createElement('div');
									  contenedor.align = 'left';
									  field.appendChild(contenedor);
									  lbl =document.createElement('label');
									  lbl.innerHTML = 'Motor:'+icremento2;
					  				  contenedor.appendChild(lbl);

					  				  select = document.createElement("input");
									  select.name="motores[]";
									  select.className="form-control";
									  contenedor.appendChild(select);
									  }
									function borrar(obj) {
									  field = document.getElementById('field');
									  field.removeChild(document.getElementById(obj));
									  field = document.getElementById('field1');
									  field.removeChild(document.getElementById(obj));
									  field = document.getElementById('field2');
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