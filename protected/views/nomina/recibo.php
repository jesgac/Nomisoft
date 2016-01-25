
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
		td{
			padding: 2px;
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

<div>
	<center>
	<table border="1">
		<tr style="font-size:14px;">
			<td colspan="2" class="bold no-border"><?php echo $model->empresa->nombre_emp; ?></td>
			<td colspan="1" class="bold right no-border">R.I.F. No.</td>
			<td colspan="3" class="bold no-border"><?php echo $model->empresa->rif; ?></td>	
		</tr>
		<tr>
			<td colspan="6"><?php echo $model->empresa->direccion; ?></td>
		</tr>
		<tr>
			<td>Teléfono:</td>
			<td colspan="5"><?php echo $model->empresa->telefono; ?></td>
		</tr>
		<tr>
			<td colspan="6" bgcolor="cyan" class="center bold">RECIBO DE PAGO</td>
		</tr>
		<tr>
			<td>Nombre y Apellido</td>
			<td colspan="2"><?php echo $model->persona->nombre.' '.$model->persona->apellido;?></td>
			<td colspan="2" class="right">Cedula:</td>
			<td><?php echo number_format($model->persona->cedula, 0,'','.'); ?></td>
		</tr>
		<tr>
			<td>Cargo:</td>
			<td class="bold"><?php echo $model->cargo->cargo ?></td>
			<td class="bold"><?php echo $model->obra->nombre_obra ?></td>
			<TD class="no-border">Sueldo</TD>
			<td class="no-border"><?php echo $model->cargo->tipo_sueldo = 1 ? 'Semanal' : 'Mensual'; ?></td>
			<td><?php echo number_format($model->cargo->sueldo, 2,',','.')." Bs."; ?></td>
		</tr>
		<tr>
			<td colspan="3" bgcolor="cyan" class="center bold">I ASIGNACIONES</td>
			<td colspan="3" bgcolor="cyan" class="center bold">II DEDUCCIONES</td>
		</tr>
		<tr>
			<td colspan="3" class="no-border"><?php echo $model->cargo->tipo_sueldo ? 'PAGO DE UNA SEMANA DE TRABAJO' : 'PAGO DE UN MES DE TRABAJO' ?></td>
			<td colspan="3"></td>
		</tr>
		<tr>
			<td colspan="2" class="no-border"><?php echo lunes($model->fecha);?></td>
			<td class="right"><?php echo number_format($model->cargo->sueldo, 2,',','.')." Bs."; ?></td>
			<td rowspan="2" colspan="2">S.S.O 4% </td>
			<td rowspan="2" class="right"><?php echo ($model->deduc->sso==0) ? '-' : number_format($model->deduc->sso, 2,',','.')." Bs."; ?></td>
		</tr>
		<tr>
			<td colspan="2">Feriado</td>
			<td class="right"><?php echo ($model->asig->feriado == 0) ? '-' : number_format($model->asig->feriado, 2,',','.')." Bs." ?></td>
		</tr>
		<tr>
			<td colspan="2">Bono Alimenticio</td>
			<td class="right"><?php echo ($model->asig->b_alimenticio == 0) ? '-' : number_format($model->asig->b_alimenticio, 2,',','.')." Bs." ?></td>
			<td rowspan="2" colspan="2">S.P.F 0.5%</td>
			<td rowspan="2" class="right"><?php echo ($model->deduc->spf==0) ? '-' : number_format($model->deduc->spf, 2,',','.')." Bs."; ?></td>
		</tr>
		<tr>
			<td colspan="2">Sábado</td>
			<td class="right"><?php echo ($model->asig->sabado== 0) ? '-' : number_format($model->asig->sabado, 2,',','.')." Bs." ?></td>
		</tr>
		<tr>
			<td colspan="2">Horas Extras Diurnas</td>
			<td class="right"><?php echo ($model->asig->horasextra_diurna==0) ? '-' : number_format($model->asig->horasextra_diurna, 2,',','.')." Bs." ?></td>
			<td rowspan="2" colspan="2">L.P.H 1%</td>
			<td rowspan="2" class="right"><?php echo ($model->deduc->lph==0) ? '-' : number_format($model->deduc->lph, 2,',','.')." Bs."; ?></td>
		</tr>
		<tr>
			<td colspan="2">Horas Extras Nocturnas</td>
			<td class="right"><?php echo ($model->asig->horasextras_nocturna==0) ? '-' : number_format($model->asig->horasextras_nocturna, 2,',','.')." Bs." ?></td>
		</tr>
		<tr>
			<td colspan="2">Vaciado</td>
			<td class="right"><?php echo ($model->vaciado==0) ? '-' : number_format($model->vaciado, 2,',','.')." Bs." ?></td>
			<td colspan="2">Inasistencia</td>
			<td class="right"><?php echo ($model->deduc->inasistencia==0) ? '-' : number_format($model->deduc->inasistencia, 2,',','.')." Bs."; ?></td>
		</tr>
		<tr>
			<td colspan="2">Otros</td>
			<td class="right"><?php echo ($model->otros==0) ? '-' : number_format($model->otros, 2,',','.')." Bs." ?></td>
			<td colspan="2">Descuento</td>
			<td class="right"><?php echo ($model->descuento==0) ? '-' : number_format($model->descuento, 2,',','.')." Bs."; ?></td>
		</tr>
		<tr>
			<td colspan="2">Prestamos</td>
			<td class="right"><?php echo ($model->prestamos==0) ? '-' : number_format($model->prestamos, 2,',','.')." Bs." ?></td>
			<td colspan="2"></td>
			<td></td>
		</tr>
		<tr>
			<td colspan="2" class="bold">TOTAL ASIGNACIONES</td>
			<td class="right"><?php echo number_format($model->total_asig, 2,',','.')." Bs." ?></td>
			<td colspan="2" class="bold">TOTAL DEDUCCIONES</td>
			<td class="right"><?php echo number_format($model->total_deduc, 2,',','.')." Bs."; ?></td>
		</tr>
		<tr style="font-size:14px;">
			<td colspan="3" class="bold">TOTAL A PAGAR</td>
			<td colspan="3" class="right bold"><?php echo number_format($model->neto, 2,',','.')." Bs."; ?></td>
		</tr>
		<tr>
			<td colspan="3" class="no-border">Al <?php echo date('d-m-Y',strtotime($model->fecha)) ?></td>
			<td colspan="3" class="no-border"></td>
		</tr>
		<tr>
			<td colspan="3" class="no-border"></td>
			<td colspan="3" class="center no-border">Recibi Conforme</td>
		</tr>
		<tr>
			<td colspan="3" class="no-border"></td>
			<td colspan="3" class="no-border">Firma: ___________________________  </td>
		</tr>
		<tr>
			<td colspan="3" class="no-border"></td>
			<td colspan="3" class="no-border">C.I:</td>

		</tr>
		<tr><td colspan="6" class="no-border"> </td></tr>
	</table>
	<br><hr><br>
	<table border="1">
		<tr style="font-size:14px;">
			<td colspan="2" class="bold no-border"><?php echo $model->empresa->nombre_emp; ?></td>
			<td colspan="1" class="bold right no-border">R.I.F. No.</td>
			<td colspan="3" class="bold no-border"><?php echo $model->empresa->rif; ?></td>	
		</tr>
		<tr>
			<td colspan="6"><?php echo $model->empresa->direccion; ?></td>
		</tr>
		<tr>
			<td>Teléfono:</td>
			<td colspan="5"><?php echo $model->empresa->telefono; ?></td>
		</tr>
		<tr>
			<td colspan="6" bgcolor="cyan" class="center bold">RECIBO DE PAGO</td>
		</tr>
		<tr>
			<td>Nombre y Apellido</td>
			<td colspan="2"><?php echo $model->persona->nombre.' '.$model->persona->apellido;?></td>
			<td colspan="2" class="right">Cedula:</td>
			<td><?php echo number_format($model->persona->cedula, 0,'','.'); ?></td>
		</tr>
		<tr>
			<td>Cargo:</td>
			<td class="bold"><?php echo $model->cargo->cargo ?></td>
			<td class="bold"><?php echo $model->obra->nombre_obra ?></td>
			<TD class="no-border">Sueldo</TD>
			<td class="no-border"><?php echo $model->cargo->tipo_sueldo = 1 ? 'Semanal' : 'Mensual'; ?></td>
			<td><?php echo number_format($model->cargo->sueldo, 2,',','.')." Bs."; ?></td>
		</tr>
		<tr>
			<td colspan="3" bgcolor="cyan" class="center bold">I ASIGNACIONES</td>
			<td colspan="3" bgcolor="cyan" class="center bold">II DEDUCCIONES</td>
		</tr>
		<tr>
			<td colspan="3" class="no-border"><?php echo $model->cargo->tipo_sueldo ? 'PAGO DE UNA SEMANA DE TRABAJO' : 'PAGO DE UN MES DE TRABAJO' ?></td>
			<td colspan="3"></td>
		</tr>
		<tr>
			<td colspan="2" class="no-border"><?php echo lunes($model->fecha);?></td>
			<td class="right"><?php echo number_format($model->cargo->sueldo, 2,',','.')." Bs."; ?></td>
			<td rowspan="2" colspan="2">S.S.O 4% </td>
			<td rowspan="2" class="right"><?php echo ($model->deduc->sso==0) ? '-' : number_format($model->deduc->sso, 2,',','.')." Bs."; ?></td>
		</tr>
		<tr>
			<td colspan="2">Feriado</td>
			<td class="right"><?php echo ($model->asig->feriado == 0) ? '-' : number_format($model->asig->feriado, 2,',','.')." Bs." ?></td>
		</tr>
		<tr>
			<td colspan="2">Bono Alimenticio</td>
			<td class="right"><?php echo ($model->asig->b_alimenticio == 0) ? '-' : number_format($model->asig->b_alimenticio, 2,',','.')." Bs." ?></td>
			<td rowspan="2" colspan="2">S.P.F 0.5%</td>
			<td rowspan="2" class="right"><?php echo ($model->deduc->spf==0) ? '-' : number_format($model->deduc->spf, 2,',','.')." Bs."; ?></td>
		</tr>
		<tr>
			<td colspan="2">Sábado</td>
			<td class="right"><?php echo ($model->asig->sabado== 0) ? '-' : number_format($model->asig->sabado, 2,',','.')." Bs." ?></td>
		</tr>
		<tr>
			<td colspan="2">Horas Extras Diurnas</td>
			<td class="right"><?php echo ($model->asig->horasextra_diurna==0) ? '-' : number_format($model->asig->horasextra_diurna, 2,',','.')." Bs." ?></td>
			<td rowspan="2" colspan="2">L.P.H 1%</td>
			<td rowspan="2" class="right"><?php echo ($model->deduc->lph==0) ? '-' : number_format($model->deduc->lph, 2,',','.')." Bs."; ?></td>
		</tr>
		<tr>
			<td colspan="2">Horas Extras Nocturnas</td>
			<td class="right"><?php echo ($model->asig->horasextras_nocturna==0) ? '-' : number_format($model->asig->horasextras_nocturna, 2,',','.')." Bs." ?></td>
		</tr>
		<tr>
			<td colspan="2">Vaciado</td>
			<td class="right"><?php echo ($model->vaciado==0) ? '-' : number_format($model->vaciado, 2,',','.')." Bs." ?></td>
			<td colspan="2">Inasistencia</td>
			<td class="right"><?php echo ($model->deduc->inasistencia==0) ? '-' : number_format($model->deduc->inasistencia, 2,',','.')." Bs."; ?></td>
		</tr>
		<tr>
			<td colspan="2">Otros</td>
			<td class="right"><?php echo ($model->otros==0) ? '-' : number_format($model->otros, 2,',','.')." Bs." ?></td>
			<td colspan="2">Descuento</td>
			<td class="right"><?php echo ($model->descuento==0) ? '-' : number_format($model->descuento, 2,',','.')." Bs."; ?></td>
		</tr>
		<tr>
			<td colspan="2">Prestamos</td>
			<td class="right"><?php echo ($model->prestamos==0) ? '-' : number_format($model->prestamos, 2,',','.')." Bs." ?></td>
			<td colspan="2"></td>
			<td></td>
		</tr>
		<tr>
			<td colspan="2" class="bold">TOTAL ASIGNACIONES</td>
			<td class="right"><?php echo number_format($model->total_asig, 2,',','.')." Bs." ?></td>
			<td colspan="2" class="bold">TOTAL DEDUCCIONES</td>
			<td class="right"><?php echo number_format($model->total_deduc, 2,',','.')." Bs."; ?></td>
		</tr>
		<tr style="font-size:14px;">
			<td colspan="3" class="bold">TOTAL A PAGAR</td>
			<td colspan="3" class="right bold"><?php echo number_format($model->neto, 2,',','.')." Bs."; ?></td>
		</tr>
		<tr>
			<td colspan="3" class="no-border">Al <?php echo date('d-m-Y',strtotime($model->fecha)) ?></td>
			<td colspan="3" class="no-border"></td>
		</tr>
		<tr>
			<td colspan="3" class="no-border"></td>
			<td colspan="3" class="center no-border">Recibi Conforme</td>
		</tr>
		<tr>
			<td colspan="3" class="no-border"></td>
			<td colspan="3" class="no-border">Firma: ___________________________  </td>
		</tr>
		<tr>
			<td colspan="3" class="no-border"></td>
			<td colspan="3" class="no-border">C.I:</td>
		</tr>
		<tr><td colspan="6" class="no-border"> </td></tr>
	</table>
	</div>
</body>
<?php
function lunes($date){
	$fecha = new DateTime($date);
	while (!isset($lunes)){
		if (date('l',strtotime($fecha->format('d-m-Y'))) == 'Monday')
			$lunes = $fecha->format('d-m-Y');
		else
			$fecha->sub(new DateInterval('P1D'));
	}
	for ($i=1;$i<=4;$i++){
		$fecha->add(new DateInterval('P1D'));
	}
	$viernes = $fecha->format('d-m-Y');
	return $lunes.' al '.$viernes;
}
?>




</html>
