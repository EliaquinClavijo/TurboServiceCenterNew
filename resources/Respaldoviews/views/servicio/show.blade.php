<!DOCTYPE html>
<html>
<head>
<style>
body{
      margin-top:0px;
      margin-bottom: 0px;
    }

.Parte1  {
	width:680px;
	border-collapse:collapse;
	border-spacing:0;}
.Parte1 td{
	border-style:solid;
	border-width:1px;
	overflow:hidden;
	border-color:black;}

.Parte1 th{
	border-style:solid;
	border-width:1px;
	overflow:hidden;
	border-color:black;}

.Parte1_Logo
{
  border-style:solid;
  border-radius: 0.2em;
  overflow: hidden;
  box-shadow: 1px 1px 1px black;
  border-spacing:0;
}

.proforma
{
  border-radius: 0.5em;
  overflow: hidden;
  box-shadow: 1px 1px 1px black;
  border-spacing:0;
}

.proforma td 
{
  border: 0px solid #9F9E9E;
}

.borderadd
{
  border-radius: 0.2em;
  overflow: hidden;
  box-shadow: 1px 1px 1px black;
  border-spacing:0;
}

.borderadd td
{
  border: 0px solid #9F9E9E;
}

.names td 
{
  border: 0px solid #9F9E9E;
}

.Fechas td
{
	border: 1px solid #9F9E9E;
}

.table5
{
    width:680px;
    border-radius: 0.3em;
    overflow: hidden;
    box-shadow: 0px 0px 0px black;
    border-collapse:collapse;
    border-spacing:0;
    margin-top: 3px;
    
}

.table5 td
{
  border: 1px solid #9F9E9E;
  
}

.table5-1 td
{
  text-align: center; 
  vertical-align: middle;
  font-size: 15px;
  background-color:#1d4185;

}
.table5-2 td
{
  font-size: 15px;
}

@font-face {
    font-family: Laylantia;
    src: url('/Laylantia.otf');
}

</style>
</head>
<body>
<table class="Parte1" align="center">
  <tr>
    <th class="" style="width:70%; border:0px;" rowspan="2"> 
    	
    	<table class="Parte1_Logo" style=" border:0px; width:100%; " align="center" >
		<tr>
		<th style="border:0px;" ><img src="https://i.imgur.com/QhSpF6S.jpg" alt="" width="384" height="115"/></th>
		</tr>
		<tr>
		<td style="background-color:#1d4185;" align="center"><span style="color: #ffffff; font-size: 11pt;">Prolg Av. La Cultura N° 4066 San Sebastian Cusco CEL: 958 556558</span></td>
		</tr>
		</table>
    </th>
    <th  style="width:30%; border:0px;"> 

    	<table class="proforma" align="center" style="width:95%;  margin-top:10px;">
		  <tr>
		    <th class="" style="background-color:#1d4185;" align="center"><span style="color: #ffffff;">PROFORMA</span></th>
		  </tr>
		  <tr>
		    <td class="" align="center" style="border: 1px solid #9F9E9E;"><span style="color:red;">N°{{$ser->id}}</span></td>
		  </tr>
		</table>

    </th>
  </tr>
  <tr>
    <td class=""  style="width:30%;  border:0px;"> 

    	<table class="proforma" align="center" style="width:98%; height:60px; margin-top:0px;">
		  <tr>
		    <td class="" style="text-align:left; border: 1px solid #9F9E9E;"><span style="">Telefono:{{$ser->nro_celular}}</span></td>
		  </tr>
		  <tr>
		    <td class="" style="text-align:left; border: 1px solid #9F9E9E;"><span style="">Adelanto:{{$ser->adelanto}}</span></td>
		  </tr>
		</table>
    </td>
  </tr>
</table>


<table class="Parte1" align="center">
  <tr>

    <th class="" style="width:80%; border:0px;"> 
    	<table class="names" align="center" style="width:100%; height:60px; margin-top:12px;" >
		  <tr style="" >
		    <td class="" colspan="2" style="text-align:left;"><span style="font-size: 10pt;">SEÑOR(A):  {{$ser->nombre}}{{"   "}}{{$ser->apellido_pate}}{{"  "}}{{$ser->apellido_mate}}</span></td>
        <td class="" colspan="2" style="text-align:left;"><span style="font-size: 10pt;">DNI : {{$ser->cliente_id}}</span></td>
		  </tr>
		  <tr>
		    <td class="" style="text-align:left; width:25%;"><span style="font-size: 10pt;"> MOTOR : {{"  "}}{{$ser->motor}}</span></td>
		    <td class="" style="text-align:left;width:25%;"><span style="font-size: 10pt;">OEMI : {{"   "}}{{$ser->oemi}} </span></td>
        <td class="" style="text-align:left;width:25%;"><span style="font-size: 10pt;">PLACA : {{"   "}}{{$ser->placa}} </span></td>
        <td class="" style="text-align:left;width:25%;"><span style="font-size: 10pt;">TURBO :{{"   "}}{{$ser->turbo}} </span></td>
		  </tr>
		</table>
    </th>

    <th class="" style="width:20%; border:0px;"> 
    	<table class="borderadd" style="width:98%;">
    	<tr>
		   <th class="" style="" colspan="3" align="center"><span style="font-size: 8pt;">FECHA DE EMISION</span></th>
		</tr>
    <?php
      $partes = explode("-", $ser->fecha);
        $a=$partes[0];
        $b=$partes[1];
        $c=$partes[2];
    ?>
        <tr class="" align="center">
          <td bgcolor="#1d4185" align="center" class=""><font size="1" style="color: #ffffff;">DIA</font></td>
          <td bgcolor="#1d4185" align="center" class=""><font size="1" style="color: #ffffff;">MES</font></td>
          <td bgcolor="#1d4185" align="center" class=""><font align="center" size="1" style="color: #ffffff;">AÑO</font></td>
        </tr>
        <tr class="Fechas">
          <td align="center" height="20" class="">{{$c}}</td>
          <td align="center" class="">{{$b}}</td>
          <td align="center" class="">{{$a}}</td>
        </tr>
      </table>
    </th>
  </tr>
</table>

<table  class="table5" align="center">
    <tbody>
      <tr class="table5-1">
        <td style="width: 10%;"><font color="#ffffff"><span  style="font-weight:bold">
        CANT.</span></font></td>
        <td style="width: 60%;"><font color="#ffffff"><span style="font-weight:bold">DESCRIPCION</span></font></td>
        <td style="width: 15%;"><font color="#ffffff"><span style="font-weight:bold">P. UNIT.</span></font></td>
        <td style="width: 15%;"><font color="#ffffff"><span style="font-weight:bold">IMPORTE</span></font></td>
      </tr>
    </tbody>
</table>

<table  class="table5" align="center" style="margin-top:-2px;">
    <tbody>
      
      <?php
          $var=json_decode($ser->descripcion);

      ?>
      @foreach( $var as $a)
      <tr class="table5-2">
        <td align="center" style="width: 10%;"><span  style="font-weight:bold"></span></td>
        <td align="left" style="width: 60%;"><span style="font-weight:bold; padding-left:30px;"> {{$a}}</span></td>
        <td align="center" style="width: 15%;"><span style="font-weight:bold"></span></td>
        <td style="width: 15%;"><span style="font-weight:bold"></span></td>
      </tr>
      
      @endforeach
      
      

    </tbody>
</table>

<table class="Parte1" align="center">
  <tr>

    <th class="" style="width:70%; border:0px;"> 
    	<table class="names" align="center" style="width:100%; height:60px; margin-top:10px;" >
		  <tr style="" >
		    <td class=""  style="text-align:left;"><span style="font-size: 8pt;">EN CASO DE QUE EL CLIENTE NO RECOGA SU TURBO EN 30 DIAS EL TALLER NO SE RESPONSABILIZA DE PERDIDAS O DETERIOROS</span></td>
		  </tr>
		  <tr>
		    <td class="" style="text-align:left; width:50%;"><span style="margin-left:8px; color: #1C1C1C;font-size: 20pt;font-family: Laylantia;">Gracias por su Preferencia</span></td>
		  </tr>
		</table>
    </th>

    <th class="" style="width:30%; border:0px;"> 
    	<table class="" align="center" style="width:100%; height:25px; margin-top:-25px;">
		  <tr>
		    <th class="" style="width: 50%; border:0px;"><span style="font-size: 10pt;">TOTAL S/.</span></th>
		    <th class="borderadd"style="width: 50%;">{{$ser->costo_total}}</th>
		  </tr>
		</table>
		    </th>
  </tr>
</table>
</body>
</html>