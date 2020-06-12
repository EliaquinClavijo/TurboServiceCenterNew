<!DOCTYPE html>
<shtml>
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
#fondo
{
  background-image:url("https://i.imgur.com/QhSpF6S.jpg");
  background-position: 25% 150%;
  background-size: 95%;
  background-repeat:no-repeat;
  opacity: 0.3;
  position: absolute;
  height: 400px;
  width:680px;
  align-content: center;
  text-align: center;
 
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
    width:640px;
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
  background-color:#CACFD2 ;

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
    <td style="background-color:#1d4185;" align="center"><span style="color: #ffffff; font-size: 8pt;">AV.LA CULTURA MZA.L LOTE 4 URB.NACIONES UNIDAS-SAN SEBASTIAN-CUSCO-CUSCO CEL:958556558 988008184</span></td>
    </tr>
    </table>
    </th>
    <th  style="width:30%; border:0px;"> 

      <table class="proforma" align="center" style="width:95%;  margin-top:10px;">
      <tr>
        <th class="" style="background-color:#9F9E9E;" align="center"><span style="color: #000;">PROFORMA</span></th>
      </tr>
      <tr>
        <td class="" align="center" style="border: 1px solid #9F9E9E;"><span style="color:red;">N°{{$ser[0]->servicio_id}}</span></td>
      </tr>
    </table>

    </th>
  </tr>
  <tr>
    <td class=""  style="width:30%;  border:0px;"> 

      <table class="proforma" align="center" style="width:98%; height:60px; margin-top:0px;">
      <tr>
        <td class="" style="text-align:left; border: 1px solid #9F9E9E;"><span style="">Telefono:{{@$ser[0]->nro_celular}}</span></td>
      </tr>
      <tr>
        <td class="" style="text-align:left; border: 1px solid #9F9E9E;"><span style="">Adelanto:{{@$ser[0]->adelanto}}</span></td>
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
        <td class="" colspan="2" style="text-align:left;width:40%;font-size: 10pt;">SEÑOR(A):<span style="font-size: 10pt;color: #424949;">  {{@$ser[0]->nombre}}{{"   "}}{{$ser[0]->apellido_pate}}{{"  "}}{{$ser[0]->apellido_mate}}</span></td>
        <td class=""  style="text-align:left;width:40%;font-size: 10pt;">DNI :<span style="font-size: 10pt;color: #424949;"> {{@$ser[0]->cliente_id}}</span></td>
        <td class="" style="text-align:left;width:20%;font-size: 10pt;">PLACA :<span style="font-size: 10pt;color: #424949;"> {{"   "}}{{$ser[0]->placa}} </span></td>
      </tr>
      <tr>
        <td class="" style="text-align:left; width:25%;font-size: 10pt;">MOTOR :<span style="font-size: 10pt;color: #424949;">  {{"  "}}{{$ser[0]->motor}}</span></td>
        <td class="" style="text-align:left; width:25%;font-size: 10pt;">MARCA :<span style="font-size: 10pt;color: #424949;">  {{"  "}}{{$ser[0]->marca}}</span></td>
        <td class="" style="text-align:left;width:25%;font-size: 10pt;">MODELO :<span style="font-size: 10pt;color: #424949;"> {{"   "}}{{$ser[0]->modelo}} </span></td>
        <td class="" style="text-align:left;width:25%;font-size: 10pt;">TURBO :<span style="font-size: 10pt;color: #424949;">{{"   "}}{{$ser[0]->turbo}} </span></td>
      </tr>
    </table>
    </th>

    <th class="" style="width:20%; border:0px;"> 
      <table class="borderadd" style="width:98%;">
      <tr>
       <th class="" style="" colspan="3" align="center"><span style="font-size: 8pt;">FECHA DEL SERVICIO</span></th>
    </tr>
    <?php
      $partes = explode("-", $ser[0]->fecha);
        $a=$partes[0];
        $b=$partes[1];
        $c=$partes[2];
    ?>
        <tr class="" align="center">
          <td bgcolor="#9F9E9E" align="center" class=""><font size="1" style="color: #000;">DIA</font></td>
          <td bgcolor="#9F9E9E" align="center" class=""><font size="1" style="color: #000;">MES</font></td>
          <td bgcolor="#9F9E9E" align="center" class=""><font align="center" size="1" style="color: #000;">AÑO</font></td>
        </tr>

        <tr class="Fechas">
          <td align="center" height="20" class="" style="color: #424949;">{{$c}}</td>
          <td align="center" class="" style="color: #424949;">{{$b}}</td>
          <td align="center" class="" style="color: #424949;">{{$a}}</td>
        </tr>
        <tr>
      
    </tr>
    
      </table>
    </th>
  </tr>
</table>


<div align="center">
<h3>SERVICIO PRESTADO</h3>
</div>

<table  class="table5" align="center">
    <tbody>
      <tr class="table5-1">
        <td style="width: 10%;"><font color="#000"><span  style="font-weight:bold">
        CANT.</span></font></td>
        <td style="width: 60%;"><font color="#000"><span style="font-weight:bold">DESCRIPCION</span></font></td>
        <td style="width: 15%;"><font color="#000"><span style="font-weight:bold">P. UNIT.</span></font></td>
        <td style="width: 15%;"><font color="#000"><span style="font-weight:bold">IMPORTE</span></font></td>
      </tr>
    </tbody>
</table>

<table  class="table5" align="center" style="margin-top:-2px;">
    <tbody>
      
      <?php
          $var=json_decode(@$ser[0]->descripcion);
          $var2=json_decode(@$ser[0]->importe);
          $in=0;
      ?>
      @foreach( $var as $a)
      <tr class="table5-2">
        <td align="center" style="width: 10%;"><span  style="font-weight:bold"></span></td>
        <td align="left" style="width: 60%;"><span style="font-weight:bold; padding-left:30px;color: #424949;"> {{$a}}</span></td>
        <td align="center" style="width: 15%;"><span style="font-weight:bold"></span></td>
        <td style="width: 15%;"><span style="font-weight:bold;color: #424949;"><?php echo @$var2[$in];  ?></span></td>
      </tr>
     <?php $in+=1; ?>
      @endforeach
     
      <tr class="table5-2">
        <td align="center" style="width: 10%;"><span  style="font-weight:bold"></span></td>
        <td align="left" style="width: 60%;"><span style="font-weight:bold; padding-left:30px;"> </span></td>
        <td align="center" style="width: 15%;"><span style="font-weight:bold"></span><STRONG>TOTAL :</STRONG></td>
        <td style="width: 15%;"><span style="font-weight:bold"></span><strong>{{$ser[0]->costo_total}}</strong></td>
      </tr>
    </tbody>
</table>
<div style="height:20px; "></div>
@for ($i = 0; $i < count($ser); $i++)
<table  class="table5" align="center">
    <tbody>
      <tr class="table5-1">
        <td style="width: 100%;"><font color="#000"><span style="font-weight:bold">RECLAMOS</span></font></td>
      </tr>
    </tbody>
</table>
<table  class="table5" align="center">
    <tbody>
      <tr class="table5-1">
        
        <td style="width: 50%;"><font color="#000"><span style="font-weight:bold">DESCRIPCION</span></font></td>
        <td style="width: 25%;"><font color="#000"><span style="font-weight:bold">ESTADO DE RECLAMOS</span></font></td>
        <td style="width: 25%;"><font color="#000"><span style="font-weight:bold">FECHA DE RECLAMO</span></font></td>
      </tr>
    </tbody>
</table>
<table  class="table5" align="center" style="margin-top:-2px;">
    <tbody>
      <tr class="table5-2">
        
        <td align="center" style="width: 50%;color: #424949;"> {{@$ser[$i]->text}}</td>
        <td align="center" style="width: 25%;color: #424949;">{{@$ser[$i]->estado}}</td>
        <td align="center" style="width: 25%;color: #424949;">{{@$ser[$i]->fecha_reclamo}}</td>
      </tr>
    </tbody>
</table>


<table  class="table5" align="center">
    <tbody>
      <tr class="table5-1">
        <td style="width: 100%;"><font color="#000"><span style="font-weight:bold">SOLUCION</span></font></td>
        
      </tr>
    </tbody>
</table>
<table  class="table5" align="center">
    <tbody>
      <tr class="table5-1">
        <td style="width: 50%;"><font color="#000"><span style="font-weight:bold">DESCRIPCION</span></font></td>
        <td style="width: 25%;"><font color="#000"><span style="font-weight:bold">ESTADO DE RECLAMOS</span></font></td>
        <td style="width: 25%;"><font color="#000"><span style="font-weight:bold">FECHA DE SOLUCION</span></font></td>
      </tr>
    </tbody>
</table>
<table  class="table5" align="center" style="margin-top:-2px;">
    <tbody>
      <tr class="table5-2">
        <td align="center" style="width: 50%;color: #424949;">{{@$ser[$i]->text2}}</td>
        <td align="center" style="width: 25%;color: #424949;">{{@$ser[$i]->estado}}</td>
        <td align="center" style="width: 25%;color: #424949;">{{@$ser[$i]->fecha_solucion}}</td>
      </tr>
    </tbody>
</table>

<div style="height:20px; "></div>
@endfor
<table class="Parte1" align="center">
  <tr>

    <th class="" style="width:70%; border:0px;"> 
      <table class="names" align="center" style="width:100%; height:60px; margin-top:10px;" >
      <tr style="" >
        <td class=""  style="text-align:center;"><span style="font-size: 8pt;">EN CASO DE QUE EL CLIENTE NO RECOGA SU TURBO EN 30 DIAS EL TALLER NO SE RESPONSABILIZA DE PERDIDAS O DETERIOROS</span></td>
      </tr>
      
    </table>
    </th>

    
  </tr>
</table>


</body>
</html>