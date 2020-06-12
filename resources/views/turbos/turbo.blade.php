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
   background-color: #E7F2FB  ;
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
				Turbo {{$turbo->name}}
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-10">
					<div class="register" align="center">
						
							
					

							<div  align="center">
    		
					    		<table  style="undefined;table-layout: fixed; width: 100%">
									<colgroup>
									<col style="width: 35%">
									<col style="width: 10%">
									<col style="width: 55%">
									</colgroup>
									  <tr>
									    <th  colspan="3"><h3>Datos del turbo {{$turbo->name}}  </h3></th>
									  </tr>

								</table>
							<br>
			<div class="row">
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Marcas Compatibles
                        </div>
                        <?php
			            $obj = json_decode($turbo->marcas);
			            ?>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php $count = 1; ?>
                                        @foreach ($obj as $k=>$v)
                                        @if(!$k=="")
                                        <tr>
                                            <td>{{$count}}</td>
                                            <td>{{$v}}</td>
                                        </tr>
                                        <?php $count = $count +1; ?>
                                         @endif
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Modelos Compatibles
                        </div>
                        <?php
			            $obj = json_decode($turbo->modelos);
			            ?>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php $count = 1; ?>
                                        @foreach ($obj as $k=>$v)
                                        @if(!$k=="")
                                        <tr>
                                            <td>{{$count}}</td>
                                            <td>{{$v}}</td>
                                        </tr>
                                        <?php $count = $count +1; ?>
                                         @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                 <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Motores Compatibles
                        </div>
                        <?php
			            $obj = json_decode($turbo->motores);
			            ?>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php $count = 1; ?>
                                        @foreach ($obj as $k=>$v)
                                        @if(!$k=="")
                                        <tr>
                                            <td>{{$count}}</td>
                                            <td>{{$v}}</td>
                                        </tr>
                                        <?php $count = $count +1; ?>
                                         @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>							
					
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@stop