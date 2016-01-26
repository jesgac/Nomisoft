<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Recibo</title>
	<style>
		body{
			font-family: Helvetica;
		}
		table{

			font-size:10px;
			border-collapse: collapse;
			border-left-style: solid;
			border-left-color:black;
			border-left-width: 1px;
			border-bottom-style: solid;
			border-bottom-color:black;
			border-bottom-width: 1px;
			border-right-style: solid;
			border-right-color:black;
			border-right-width: 1px;
			border-top-style: solid;
			border-top-color:black;
			border-top-width: 1px;
		}

		.btn {
		  background: #3498db;
		  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
		  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
		  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
		  background-image: -o-linear-gradient(top, #3498db, #2980b9);
		  background-image: linear-gradient(to bottom, #3498db, #2980b9);
		  font-family: Arial;
		  color: #ffffff;
		  font-size: 14px;
		  padding: 10px 20px 10px 20px;
		  text-decoration: none;
		}

		.btn:hover {
		  background: #3cb0fd;
		  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
		  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
		  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
		  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
		  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
		  text-decoration: none;
		}
		@media print
			{    
		
			    .no-print, .no-print *
			    {
			        display: none !important;
			    }
			}
		td{
			padding-top: 2px;
			padding-bottom: 6px;
		}
		.bold{
			font-weight: bold;
		}
		.center{
			text-align: center;
		}
		.right{
			text-align: right;
		}
		.no-border{
			border-style: none;
		}
	</style>
</head>
<body>
	<center>
	<table border="0" class="no-border">
		<tr style="font-size:14px;">
			<td colspan="7" class="bold no-border center">FICHA DEL TRABAJADOR</td>	
		</tr>
		<tr style="font-size:14px;">
			<td bgcolor="blue" colspan="7" class="bold no-border"></td>	
		</tr>
		<tr style="font-size:14px;">
			<td bgcolor="cyan" colspan="7" class="bold no-border center">Datos Personales</td>	
		</tr>
		<tr>
			<td class="bold">Nombre y Apellido</td>
			<td colspan="6"><?php echo $model->nombre.' '.$model->apellido; ?></td>
		</tr>
		<tr>
			<td class="bold">Cedula de Identidad</td>
			<td colspan="2"><?php echo number_format($model->cedula, 0,'','.'); ?></td>
			<td class="bold">Nacionalidad</td>
			<td><?php echo $model->getNacionalidad(); ?></td>
			<td class="bold">Genero</td>
			<td><?php echo $model->getSexo(); ?></td>
		</tr>
		<tr>
			<td class="bold">Estado civil</td>
			<td colspan="2">Soltero</td>
			<td class="bold">Fecha Ingreso</td>
			<td>n/a</td>
			<td class="bold">Fecha Egreso</td>
			<td>n/a</td>
		</tr>
		<tr>
			<td class="bold">Domicilio</td>
			<td colspan="6"><?php echo $model->direccion; ?></td>
		</tr>
		<tr>
			<td class="bold">Fecha de Nacimiento</td>
			<td><?php echo date('d-m-Y',strtotime($model->fecha_nac)) ?></td>
			<td class="bold">Lugar de Nacimiento</td>
			<td colspan="2"><?php echo $model->lugar_nac; ?></td>
			<td class="bold">Edad</td>
			<td><?php echo calculaEdad($model->fecha_nac); ?></td>
		</tr>
		<tr>
			<td class="bold">Correo Electronico</td>
			<td colspan="4"><?php echo $model->email ?></td>
			<td class="bold">Telefono</td>
			<td colspan="2"><?php echo $model->telefono; ?></td>			
		</tr>
		<tr style="font-size:14px;">
			<td bgcolor="blue" colspan="7" class="bold no-border"></td>	
		</tr>
		<tr style="font-size:14px;">
			<td bgcolor="cyan" colspan="3" class="bold no-border center">Familiares</td>
			<td bgcolor="cyan" colspan="4" class="bold no-border center">Uniforme</td>		
		</tr>
		<tr>
			<td class="bold center">Hijos</td>
			<td class="bold center">Fecha de Nacimiento</td>
			<td class="bold center">Edad</td>
			<td colspan="2" class="bold center">Talla de Camisa</td>
			<td class="bold center">Talla de Pantalon</td>
			<td class="bold center">Talla de Zapatos</td>		
		</tr>
		<?php echo $model->getHijos(); ?>
		<?php echo $model->getTallas(); ?>



		<tr style="font-size:14px;">
			<td bgcolor="blue" colspan="7" class="bold no-border"></td>	
		</tr>
		<tr style="font-size:14px;">
			<td bgcolor="cyan" colspan="7" class="bold no-border center">Empresa</td>	
		</tr>
		<tr>
			<td class="bold center">Cargo</td>
			<td colspan="2" class="bold center">Obra</td>
			<td colspan="2" class="bold center">Empresa</td>
			<td class="bold center">Tipo de Sueldo</td>	
			<td class="bold center">Categoria</td>			
		</tr>
		<tr>
			<td class="center"><?php echo $model->getCargo(); ?></td>
			<td colspan="2" class="center"><?php echo $model->getObra(); ?></td>
			<td colspan="2" class="center"><?php echo $model->getEmpresa(); ?></td>
			<td class="center"><?php echo $model->getSueldo(); ?></td>	
			<td class="center">Empleado</td>			
		</tr>
		<tr style="font-size:14px;">
			<td bgcolor="blue" colspan="7" class="bold no-border"></td>	
		</tr>
		

		<tr>
			<td colspan="7" class="no-border"><br><br></td>	
		</tr>
		<tr>
			<td colspan="4" class="bold center"><hr></td>
			<td colspan="3" class="bold center"></td>				
		</tr>
		<tr>
			<td colspan="4" class="bold center">Firma del Trabajador</td>
			<td colspan="3" class="bold center"><?php echo date("d-m-Y") ?></td>				
		</tr>
	</table>
	<br><center>
<input type="button" onClick=" window.print();" class="btn no-print" name="Imprime" value="Imprimir">

</body>


</html>
<?php
	function calculaedad($fechanacimiento){
	list($ano,$mes,$dia) = explode("-",$fechanacimiento);
	$ano_diferencia  = date("Y") - $ano;
	$mes_diferencia = date("m") - $mes;
	$dia_diferencia   = date("d") - $dia;
	
	if ($mes_diferencia <= 0){
		if($dia_diferencia < 0)
			$ano_diferencia--;
	}

	return $ano_diferencia;
	}

?>