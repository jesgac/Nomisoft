
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Recibo</title>
	<link href="<?php echo Yii::app()->baseUrl; ?>/css/imprimir.css" rel="stylesheet" />
</head>
<body>
<div id="muestra"> 
	
	<center>
	<?php for($i=0;$i<=1;$i++): ?>
	<table border="1" class="reporte helvetica">
		<tr style="font-size:14px;">
			<td colspan="2" class="bold no-border"><?php echo $a->empresa->nombre_emp; ?></td>
			<td colspan="1" class="bold right no-border">R.I.F. No.</td>
			<td colspan="3" class="bold no-border"><?php echo $a->empresa->rif; ?></td>	
		</tr>
		<tr>
			<td colspan="6"><?php echo $a->empresa->direccion; ?></td>
		</tr>
		<tr>
			<td>Teléfono:</td>
			<td colspan="5"><?php echo $a->empresa->telefono; ?></td>
		</tr>
		<tr>
			<td colspan="6" bgcolor="cyan" class="center bold">RECIBO DE PAGO</td>
		</tr>
		<tr>
			<td>Nombre y Apellido</td>
			<td colspan="2"><?php echo $a->persona->nombre.' '.$a->persona->apellido;?></td>
			<td colspan="2" class="right">Cedula:</td>
			<td><?php echo number_format($a->persona->cedula, 0,'','.'); ?></td>
		</tr>
		<tr>
			<td>Cargo:</td>
			<td class="bold"><?php echo $a->cargo->cargo ?></td>
			<td class="bold"><?php echo $a->obra->nombre_obra ?></td>
			<TD class="no-border">Sueldo</TD>
			<td class="no-border"><?php echo $a->cargo->tipo_sueldo == 1 ? 'Semanal' : 'Quincenal'; ?></td>
			<td><?php echo $a->cargo->tipo_sueldo == 1 ? number_format($a->cargo->sueldo, 2,',','.')." Bs." : number_format(($a->cargo->sueldo /2), 2,',','.')." Bs."; ?></td>
						
		</tr>
		<tr>
			<td colspan="3" bgcolor="cyan" class="center bold">I ASIGNACIONES</td>
			<td colspan="3" bgcolor="cyan" class="center bold">II DEDUCCIONES</td>
		</tr>
		<tr>
			<td colspan="3" class="no-border"><?php echo $a->cargo->tipo_sueldo == 1 ? 'PAGO DE UNA SEMANA DE TRABAJO' : 'PAGO DE UNA QUINCENA DE TRABAJO' ?></td>
			<td colspan="3"></td>
		</tr>
		<tr>
			<td colspan="2" class="no-border"><?php echo lunes($a->fecha);?></td>
			<td class="right"><?php echo $a->cargo->tipo_sueldo == 1 ? number_format($a->cargo->sueldo, 2,',','.')." Bs." : number_format(($a->cargo->sueldo /2), 2,',','.')." Bs."; ?></td>
			<td rowspan="2" colspan="2">S.S.O 4% </td>
			<td rowspan="2" class="right"><?php echo ($a->deduc->sso==0) ? '-' : number_format($a->sso($a->deduc->sso,$a->empleado->id), 2,',','.')." Bs."; ?></td>
		</tr>
		<tr>
			<td colspan="2">Feriado</td>
			<td class="right"><?php echo ($a->asig->feriado == 0) ? '-' : number_format($a->feriado($a->asig->feriado,$a->empleado->id), 2,',','.')." Bs." ?></td>
		</tr>
		<tr>
			<td colspan="2">Bono Alimenticio</td>
			<td class="right"><?php echo ($a->asig->b_alimenticio == 0) ? '-' : number_format($a->b_alimenticio($a->asig->b_alimenticio), 2,',','.')." Bs." ?></td>
			<td rowspan="2" colspan="2">S.P.F 0.5%</td>
			<td rowspan="2" class="right"><?php echo ($a->deduc->spf==0) ? '-' : number_format($a->spf($a->deduc->spf,$a->empleado->id), 2,',','.')." Bs."; ?></td>
		</tr>
		<tr>
			<td colspan="2">Sábado</td>
			<td class="right"><?php echo ($a->asig->sabado== 0) ? '-' : number_format($a->sabado($a->asig->sabado,$a->empleado->id), 2,',','.')." Bs." ?></td>
		</tr>
		<tr>
			<td colspan="2">Horas Extras Diurnas</td>
			<td class="right"><?php echo ($a->asig->horasextra_diurna==0) ? '-' : number_format($a->hdiurnas($a->asig->horasextra_diurna,$a->empleado->id), 2,',','.')." Bs." ?></td>
			<td rowspan="2" colspan="2">L.P.H 1%</td>
			<td rowspan="2" class="right"><?php echo ($a->deduc->lph==0) ? '-' : number_format($a->lph($a->deduc->lph,$a->empleado->id), 2,',','.')." Bs."; ?></td>
		</tr>
		<tr>
			<td colspan="2">Horas Extras Nocturnas</td>
			<td class="right"><?php echo ($a->asig->horasextras_nocturna==0) ? '-' : number_format($a->hnocturnas($a->asig->horasextras_nocturna,$a->empleado->id), 2,',','.')." Bs." ?></td>
		</tr>
		<tr>
			<td colspan="2">Vaciado</td>
			<td class="right"><?php echo ($a->vaciado==0) ? '-' : number_format($a->vaciado, 2,',','.')." Bs." ?></td>
			<td colspan="2">Inasistencia</td>
			<td class="right"><?php echo ($a->deduc->inasistencia==0) ? '-' : number_format($a->inasistencia($a->deduc->inasistencia,$a->empleado->id), 2,',','.')." Bs."; ?></td>
		</tr>
		<tr>
			<td colspan="2">Otros</td>
			<td class="right"><?php echo ($a->otros==0) ? '-' : number_format($a->otros, 2,',','.')." Bs." ?></td>
			<td colspan="2">Descuento</td>
			<td class="right"><?php echo ($a->descuento==0) ? '-' : number_format($a->descuento, 2,',','.')." Bs."; ?></td>
		</tr>
		<tr>
			<td colspan="2">Prestamos</td>
			<td class="right"><?php echo ($a->prestamos==0) ? '-' : number_format($a->prestamos, 2,',','.')." Bs." ?></td>
			<td colspan="2"></td>
			<td></td>
		</tr>
		<tr>
			<td colspan="2">Asistencia</td>
			<td class="right"><?php echo ($a->asig->asistencia==0) ? '-' : number_format($a->asistencia($a->asig->asistencia,$a->empleado->id), 2,',','.')." Bs." ?></td>  
			<td colspan="2"></td>
			<td></td>
		</tr>
		<tr>
			<td colspan="2" class="bold">TOTAL ASIGNACIONES</td>
			<td class="right"><?php echo number_format($a->total_asig, 2,',','.')." Bs." ?></td>
			<td colspan="2" class="bold">TOTAL DEDUCCIONES</td>
			<td class="right"><?php echo number_format($a->total_deduc, 2,',','.')." Bs."; ?></td>
		</tr>
		<tr style="font-size:14px;">
			<td colspan="3" class="bold">TOTAL A PAGAR</td>
			<td colspan="3" class="right bold"><?php echo number_format($a->neto, 2,',','.')." Bs."; ?></td>
		</tr>
		<tr>
			<td colspan="3" class="no-border">Al <?php echo date('d-m-Y',strtotime($a->fecha)) ?></td>
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
	<?php endfor; ?>
	</div>

	<center><br><input type="button" value="Imprimir" onclick="javascript:imprSelec('muestra')" class="btn no-print" />
</body>

</html>
 
<script type="text/javascript">
	function imprSelec(muestra)
	{var recibo=document.getElementById(muestra);
		var ventimp=window.open(' ','popimpr');
		ventimp.document.write('<html><head><title>Impresion!</title><link href="<?php echo Yii::app()->baseUrl; ?>/css/imprimir.css" rel="stylesheet"></head><body>');
		ventimp.document.write(recibo.innerHTML);
		ventimp.document.close();
		ventimp.print();
		ventimp.close();}

</script>
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



