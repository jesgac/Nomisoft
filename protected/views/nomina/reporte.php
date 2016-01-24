<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>REPORTE NOMINA</title>
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
			padding: 1px;
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
	<table border="1">
		<tr style="font-size:14px;">
			<td rowspan="2" colspan="2" class="bold no-border"><img src="<?php echo Yii::app()->baseUrl; ?>/images/favicon.png" alt="" width='50%'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
			<td colspan="17" class="bold no-border">NOMINA DE TRABAJADORES</td>
		</tr>
		<tr style="font-size:14px;">
			<td colspan="1" class="bold no-border">FECHA</td>
			<td colspan="16" class="bold no-border"><?php echo date('d-m-Y',strtotime($model)) ?></td>
		</tr>

		<tr>
			<td colspan="3" bgcolor="cyan" class="center bold thick-border">DATOS DEL TRABAJADOR</td>
			<td colspan="9" bgcolor="cyan" class="center bold">ASIGNACIONES</td>
			<td colspan="6" bgcolor="cyan" class="center bold">DEDUCCIONES</td>
			<td rowspan="2" colspan="1" bgcolor="cyan" class="center bold">NETO A PAGAR</td>
		</tr>
		<tr>
			<td colspan="1" class="center bold">OBRA</td>
			<td colspan="1" class="center bold">NOMBRE Y APELLIDO</td>
			<td colspan="1" class="center bold">SUELDO</td>

			<td colspan="1" class="center bold">ASISTENCIA</td>
			<td colspan="1" class="center bold">BONO ALIMENTICIO</td>
			<td colspan="1" class="center bold">FERIADO</td>
			<td colspan="1" class="center bold">SABADO</td>
			<td colspan="1" class="center bold">HORAS EXTRAS DIURNAS</td>
			<td colspan="1" class="center bold">HORAS EXTRAS NOCTURNAS</td>
			<td colspan="1" class="center bold">VACIADO</td>
			<td colspan="1" class="center bold">OTROS</td>
			<td colspan="1" class="center bold">TOTAL ASIG</td>

			<td colspan="1" class="center bold">SSO</td>
			<td colspan="1" class="center bold">SPF</td>
			<td colspan="1" class="center bold">LPH</td>
			<td colspan="1" class="center bold">INASISTENCIA</td>
			<td colspan="1" class="center bold">DESCUENTO</td>
			<td colspan="1" class="center bold">TOTAL DEDUCCION</td>
		</tr>
		<?php 
			$t_sueldo = 0;
			$t_asistencia = 0;
			$t_alimenticio = 0;
			$t_feriado = 0;
			$t_sabado = 0;
			$t_diurnas = 0;
			$t_nocturnas = 0;
			$t_vaciado = 0;
			$t_otros = 0;
			$t_asig = 0;
			$t_sso = 0;
			$t_spf = 0;
			$t_lph = 0;
			$t_inasistencia = 0;
			$t_descuento = 0;
			$t_deducciones = 0;
			$t_neto = 0; 
		?>

		

		<?php 

		$model2 = Nomina::model()->findAllByAttributes(array('fecha'=>$model));

		//print_r($model2);
		foreach ($model2 as $data): ?>
			<tr>
				<td><?php echo $data->obra->nombre_obra; ?></td>
				<td><?php echo $data->persona->nombre.' '.$data->persona->apellido; ?></td>
				<td class="right"><?php echo number_format($data->cargo->sueldo, 2,',','.')." Bs."; ?></td> <?php $t_sueldo += $data->cargo->sueldo; ?>
				<td class="right"><?php echo ($data->asig->asistencia==0) ? '-' : number_format($data->asig->asistencia, 2,',','.')." Bs."; ?></td> <?php $t_asistencia += $data->asig->asistencia; ?>
				<td class="right"><?php echo ($data->asig->b_alimenticio==0) ? '-' : number_format($data->asig->b_alimenticio, 2,',','.')." Bs."; ?></td> <?php $t_alimenticio += $data->asig->b_alimenticio; ?>
				<td class="right"><?php echo ($data->asig->feriado==0) ? '-' : number_format($data->asig->feriado, 2,',','.')." Bs."; ?></td> <?php $t_feriado += $data->asig->feriado; ?>
				<td class="right"><?php echo ($data->asig->sabado==0) ? '-' : number_format($data->asig->sabado, 2,',','.')." Bs."; ?></td> <?php $t_sabado += $data->asig->sabado; ?>
				<td class="right"><?php echo ($data->asig->horasextra_diurna==0) ? '-' : number_format($data->asig->horasextra_diurna, 2,',','.')." Bs."; ?></td> <?php $t_diurnas += $data->asig->horasextra_diurna; ?>
				<td class="right"><?php echo ($data->asig->horasextras_nocturna==0) ? '-' : number_format($data->asig->horasextras_nocturna, 2,',','.')." Bs."; ?></td> <?php $t_nocturnas += $data->asig->horasextras_nocturna; ?>
				<td class="right"><?php echo ($data->vaciado==0) ? '-' : number_format($data->vaciado, 2,',','.')." Bs."; ?></td> <?php $t_vaciado += $data->vaciado; ?>
				<td class="right"><?php echo ($data->otros==0) ? '-' : number_format($data->otros, 2,',','.')." Bs."; ?></td> <?php $t_otros += $data->otros; ?>
				<td class="right"><?php echo number_format($data->total_asig, 2,',','.')." Bs."; ?></td> <?php $t_asig += $data->total_asig; ?>
				<td class="right"><?php echo ($data->deduc->sso==0) ? '-' : number_format($data->deduc->sso, 2,',','.')." Bs."; ?></td> <?php $t_sso += $data->deduc->sso; ?>
				<td class="right"><?php echo ($data->deduc->spf==0) ? '-' : number_format($data->deduc->spf, 2,',','.')." Bs."; ?></td> <?php $t_spf += $data->deduc->spf; ?>
				<td class="right"><?php echo ($data->deduc->lph==0) ? '-' : number_format($data->deduc->lph, 2,',','.')." Bs."; ?></td> <?php $t_lph += $data->deduc->lph; ?>
				<td class="right"><?php echo ($data->deduc->inasistencia==0) ? '-' : number_format($data->deduc->inasistencia, 2,',','.')." Bs."; ?></td> <?php $t_inasistencia += $data->deduc->inasistencia; ?>
				<td class="right"><?php echo ($data->descuento==0) ? '-' : number_format($data->descuento, 2,',','.')." Bs."; ?></td> <?php $t_descuento += $data->descuento; ?>
				<td class="right"><?php echo number_format($data->total_deduc, 2,',','.')." Bs."; ?></td> <?php $t_deducciones += $data->total_deduc ?>
				<td class="right"><?php echo number_format($data->neto, 2,',','.')." Bs."; ?></td> <?php $t_neto += $data->neto ?>
			</tr>
		<?php endforeach?>

		<tr>
			<td colspan="2" class="center bold" bgcolor="cyan">TOTALES</td>
			<td class="right bold" bgcolor="cyan"><?php echo number_format($t_sueldo, 2,',','.')." Bs.";?></td>
			<td class="right bold" bgcolor="cyan"><?php echo number_format($t_asistencia, 2,',','.')." Bs.";?></td>
			<td class="right bold" bgcolor="cyan"><?php echo number_format($t_alimenticio, 2,',','.')." Bs.";?></td>
			<td class="right bold" bgcolor="cyan"><?php echo number_format($t_feriado, 2,',','.')." Bs.";?></td>
			<td class="right bold" bgcolor="cyan"><?php echo number_format($t_sabado, 2,',','.')." Bs.";?></td>
			<td class="right bold" bgcolor="cyan"><?php echo number_format($t_diurnas, 2,',','.')." Bs.";?></td>
			<td class="right bold" bgcolor="cyan"><?php echo number_format($t_nocturnas, 2,',','.')." Bs.";?></td>
			<td class="right bold" bgcolor="cyan"><?php echo number_format($t_vaciado, 2,',','.')." Bs.";?></td>
			<td class="right bold" bgcolor="cyan"><?php echo number_format($t_otros, 2,',','.')." Bs.";?></td>
			<td class="right bold" bgcolor="cyan"><?php echo number_format($t_asig, 2,',','.')." Bs.";?></td>
			<td class="right bold" bgcolor="cyan"><?php echo number_format($t_sso, 2,',','.')." Bs.";?></td>
			<td class="right bold" bgcolor="cyan"><?php echo number_format($t_spf, 2,',','.')." Bs.";?></td>
			<td class="right bold" bgcolor="cyan"><?php echo number_format($t_lph, 2,',','.')." Bs.";?></td>
			<td class="right bold" bgcolor="cyan"><?php echo number_format($t_inasistencia, 2,',','.')." Bs.";?></td>
			<td class="right bold" bgcolor="cyan"><?php echo number_format($t_descuento, 2,',','.')." Bs.";?></td>
			<td class="right bold" bgcolor="cyan"><?php echo number_format($t_deducciones, 2,',','.')." Bs.";?></td>
			<td class="right bold" style="font-size:14px;" bgcolor="cyan"><?php echo number_format($t_neto, 2,',','.')." Bs.";?></td>
		</tr>

	</table>

</body>
</html>