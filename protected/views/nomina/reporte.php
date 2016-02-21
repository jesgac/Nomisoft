<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>REPORTE NOMINA</title>
	<style>

		body{
			font-family: Helvetica;
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
			<td colspan="1" class="center bold"  bgcolor="cyan">SUELDO</td>

			<td colspan="1" class="center bold">ASISTENCIA</td>
			<td colspan="1" class="center bold">BONO ALIMENTICIO</td>
			<td colspan="1" class="center bold">FERIADO</td>
			<td colspan="1" class="center bold">SABADO</td>
			<td colspan="1" class="center bold">HORAS EXTRAS DIURNAS</td>
			<td colspan="1" class="center bold">HORAS EXTRAS NOCTURNAS</td>
			<td colspan="1" class="center bold">VACIADO</td>
			<td colspan="1" class="center bold">OTROS</td>
			<td colspan="1" class="center bold"  bgcolor="cyan">TOTAL ASIG</td>

			<td colspan="1" class="center bold">SSO</td>
			<td colspan="1" class="center bold">SPF</td>
			<td colspan="1" class="center bold">LPH</td>
			<td colspan="1" class="center bold">INASISTENCIA</td>
			<td colspan="1" class="center bold">DESCUENTO</td>
			<td colspan="1" class="center bold"  bgcolor="cyan">TOTAL DEDUCCION</td>
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
		$criteria=new CDbCriteria();

		$criteria->condition='fecha=:fecha';
		$criteria->params = array(':fecha'=>$model);
		$criteria->with=array('obra');
		$criteria->order='obra.nombre_obra';

		$model2 = Nomina::model()->findAll($criteria);


		//print_r($model2);
		foreach ($model2 as $data): ?>
		<?php 
			
		 ?>
			<?php echo ($data->empleado->nro_cuenta!="") ? '<tr>' : '<tr bgcolor="yellow">' ?>
				<td><?php echo $data->obra->nombre_obra; ?></td>
				<td><?php echo $data->persona->nombre.' '.$data->persona->apellido; ?></td>
				
				<?php if ($data->cargo->tipo_sueldo == 1){
                   	echo ($data->empleado->nro_cuenta!="") ? '<td class="right"  bgcolor="cyan">'.number_format($data->cargo->sueldo, 2,',','.'):'<td class="right"  bgcolor="yellow">'.number_format($data->cargo->sueldo, 2,',','.'); ?></td> <?php $t_sueldo += $data->cargo->sueldo;
                    }else{
                    echo ($data->empleado->nro_cuenta!="") ? '<td class="right"  bgcolor="cyan">'.number_format(($data->cargo->sueldo/2), 2,',','.'):'<td class="right"  bgcolor="yellow">'.number_format(($data->cargo->sueldo/2), 2,',','.'); ?></td> <?php $t_sueldo += ($data->cargo->sueldo/2);
                }?>
				

				<td class="right"><?php echo ($data->asig->asistencia==0) ? '-' : number_format($data->asistencia($data->asig->asistencia,$data->empleado->id), 2,',','.'); ?></td> <?php $t_asistencia += $data->asistencia($data->asig->asistencia,$data->empleado->id); ?>
				<td class="right"><?php echo ($data->asig->b_alimenticio==0) ? '-' : number_format($data->b_alimenticio($data->asig->b_alimenticio), 2,',','.'); ?></td> <?php $t_alimenticio += $data->b_alimenticio($data->asig->b_alimenticio); ?>
				<td class="right"><?php echo ($data->asig->feriado==0) ? '-' : number_format($data->feriado($data->asig->feriado,$data->empleado->id), 2,',','.'); ?></td> <?php $t_feriado += $data->feriado($data->asig->feriado,$data->empleado->id); ?>
				<td class="right"><?php echo ($data->asig->sabado==0) ? '-' : number_format($data->sabado($data->asig->sabado,$data->empleado->id), 2,',','.'); ?></td> <?php $t_sabado += $data->sabado($data->asig->sabado,$data->empleado->id); ?>
				<td class="right"><?php echo ($data->asig->horasextra_diurna==0) ? '-' : number_format($data->hdiurnas($data->asig->horasextra_diurna,$data->empleado->id), 2,',','.'); ?></td> <?php $t_diurnas += $data->hdiurnas($data->asig->horasextra_diurna,$data->empleado->id); ?>
				<td class="right"><?php echo ($data->asig->horasextras_nocturna==0) ? '-' : number_format($data->hnocturnas($data->asig->horasextras_nocturna,$data->empleado->id), 2,',','.'); ?></td> <?php $t_nocturnas += $data->hnocturnas($data->asig->horasextras_nocturna,$data->empleado->id); ?>
				<td class="right"><?php echo ($data->vaciado==0) ? '-' : number_format($data->vaciado, 2,',','.'); ?></td> <?php $t_vaciado += $data->vaciado; ?>
				<td class="right"><?php echo ($data->otros==0) ? '-' : number_format($data->otros, 2,',','.'); ?></td> <?php $t_otros += $data->otros; ?>
				<?php echo ($data->empleado->nro_cuenta!="") ? '<td class="right"  bgcolor="cyan">'. number_format($data->total_asig, 2,',','.'):'<td class="right"  bgcolor="yellow">'. number_format($data->total_asig, 2,',','.'); ?></td> <?php $t_asig += $data->total_asig; ?>
				<td class="right"><?php echo ($data->deduc->sso==0) ? '-' : number_format($data->sso($data->deduc->sso,$data->empleado->id), 2,',','.'); ?></td> <?php $t_sso += $data->sso($data->deduc->sso,$data->empleado->id); ?>
				<td class="right"><?php echo ($data->deduc->spf==0) ? '-' : number_format($data->spf($data->deduc->spf,$data->empleado->id), 2,',','.'); ?></td> <?php $t_spf += $data->spf($data->deduc->spf,$data->empleado->id); ?>
				<td class="right"><?php echo ($data->deduc->lph==0) ? '-' : number_format($data->lph($data->deduc->lph,$data->empleado->id), 2,',','.'); ?></td> <?php $t_lph += $data->lph($data->deduc->lph,$data->empleado->id); ?>
				<td class="right"><?php echo ($data->deduc->inasistencia==0) ? '-' : number_format($data->inasistencia($data->deduc->inasistencia,$data->empleado->id), 2,',','.'); ?></td> <?php $t_inasistencia += $data->inasistencia($data->deduc->inasistencia,$data->empleado->id); ?>
				<td class="right"><?php echo ($data->descuento==0) ? '-' : number_format($data->descuento, 2,',','.'); ?></td> <?php $t_descuento += $data->descuento; ?>
				<?php echo ($data->empleado->nro_cuenta!="") ? '<td class="right"  bgcolor="cyan">'.number_format($data->total_deduc, 2,',','.'):'<td class="right"  bgcolor="yellow">'.number_format($data->total_deduc, 2,',','.'); ?></td> <?php $t_deducciones += $data->total_deduc ?>
				<td class="right"><?php echo number_format($data->neto, 2,',','.'); ?></td> <?php $t_neto += $data->neto ?>
			</tr>
		<?php endforeach?>

		<tr>
			<td colspan="2" class="center bold ajustar" bgcolor="cyan">TOTALES</td>
			<td class="right bold ajustar" bgcolor="cyan"><?php echo number_format($t_sueldo, 2,',','.')."&nbspBs.";?></td>
			<td class="right bold ajustar" bgcolor="cyan"><?php echo number_format($t_asistencia, 2,',','.')."&nbspBs.";?></td>
			<td class="right bold ajustar" bgcolor="cyan"><?php echo number_format($t_alimenticio, 2,',','.')."&nbspBs.";?></td>
			<td class="right bold ajustar" bgcolor="cyan"><?php echo number_format($t_feriado, 2,',','.')."&nbspBs.";?></td>
			<td class="right bold ajustar" bgcolor="cyan"><?php echo number_format($t_sabado, 2,',','.')."&nbspBs.";?></td>
			<td class="right bold ajustar" bgcolor="cyan"><?php echo number_format($t_diurnas, 2,',','.')."&nbspBs.";?></td>
			<td class="right bold ajustar" bgcolor="cyan"><?php echo number_format($t_nocturnas, 2,',','.')."&nbspBs.";?></td>
			<td class="right bold ajustar" bgcolor="cyan"><?php echo number_format($t_vaciado, 2,',','.')."&nbspBs.";?></td>
			<td class="right bold ajustar" bgcolor="cyan"><?php echo number_format($t_otros, 2,',','.')."&nbspBs.";?></td>
			<td class="right bold ajustar" bgcolor="cyan"><?php echo number_format($t_asig, 2,',','.')."&nbspBs.";?></td>
			<td class="right bold ajustar" bgcolor="cyan"><?php echo number_format($t_sso, 2,',','.')."&nbspBs.";?></td>
			<td class="right bold ajustar" bgcolor="cyan"><?php echo number_format($t_spf, 2,',','.')."&nbspBs.";?></td>
			<td class="right bold ajustar" bgcolor="cyan"><?php echo number_format($t_lph, 2,',','.')."&nbspBs.";?></td>
			<td class="right bold ajustar" bgcolor="cyan"><?php echo number_format($t_inasistencia, 2,',','.')."&nbspBs.";?></td>
			<td class="right bold ajustar" bgcolor="cyan"><?php echo number_format($t_descuento, 2,',','.')."&nbspBs.";?></td>
			<td class="right bold ajustar" bgcolor="cyan"><?php echo number_format($t_deducciones, 2,',','.')."&nbspBs.";?></td>
			<td class="right bold ajustar" style="font-size:14px;" bgcolor="cyan"><?php echo number_format($t_neto, 2,',','.')."&nbspBs.";?></td>
		</tr>

	</table>
	<br><center><input type="button" onClick=" window.print();" class="btn no-print"  style="cursor:pointer" name="Imprime" value="Imprimir">
	<input type="button" onClick="location.href='index.php?r=nomina/admin'" class="btn no-print" style="cursor:pointer" name="Volver" value="Volver">
	
</body>
</html>