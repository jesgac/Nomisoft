<?php 
	$this->breadcrumbs=array(
	'Nómina'=>array('admin'),
	'Generar TXT',
);

$this->menu=array(
	array('label'=>'Nomina', 'url'=>array('admin')),
);
	//***CONEXIÓN A LA BD***
	/*$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "nominagm";
	$conn = new mysqli($servername, $username, $password,$dbname);*/
	//***CONEXIÓN A LA BD***

	/*$sql = ("SELECT * FROM NOMINA");

	$result = $conn->query($sql);*/
	$registro = '';
	$archivo = Yii::getPathOfAlias('application').'\..\txt\nomina.txt'; //DIRECCIÓN DEL ARCHIVO TXT
	$total = 0;
	$pagos = 0;
	
	//***CONTAR EL TOTAL A PAGAR DE LA NÓMINA Y LA CANTIDAD DE PAGOS REALIZADOS***
	/*while ($row = $result->fetch_assoc()) {
		$total += $row['neto'];
		$pagos +=1;
	}*/
	//***CONTAR EL TOTAL A PAGAR DE LA NÓMINA***

	$total = rellena_total((string) $total); //CONVERTIR A STRING PARA MEJOR MANEJO 
	$pagos = rellena_pagos(((string) $pagos)); //CONVERTIR A STRING PARA MEJOR MANEJO
	
	//***CABECERA***
	$operacion = "Nómina              "; 
	$tipo_persona= "J315328232";
	$nro_contrato = "40000315328232001";
	$nro_lote=rellena_lote("1");
	$fecha = "20150320";
	$moneda = "VEB";
	$filler = '';
	for ($i=1;$i<=158;$i++){
		$filler .=' ';
	}
	$registro = "01";
	$registro .= $operacion.$tipo_persona.$nro_contrato.$nro_lote.$fecha.$pagos.$total.$moneda.$filler;
	//***CABECERA***

	$linea = '';
	//$result->data_seek(0); //RETONRNAR EL APUNTADOR AL PRINCIPIO

	/*while ($row = $result->fetch_assoc()) {
		$linea = "02";
		$linea .=$row['tipo_persona'];
		$linea .=rellena_cedula($row['cedula']);
		$linea .=rellena_nombre($row['nombre']);
		$linea .=rellena_lote($row['referencia']);
		$linea .=rellena_desc($row['descripcion']);
		$linea .=$row['modalidad'];
		$linea .=rellena_cuenta($row['cuenta']);
		$linea .=$row['codigo_ban'];
		$linea .=date("Ymd",strtotime($row['fecha']));
		$linea .=rellena_monto($row['monto']);
		$linea .=$row['moneda'];
		$linea .=rellena_monto($row['impuesto']);
		$linea .=rellena_email($row['email']);
		$linea .=rellena_telf($row['telefono']);
		for ($i=1;$i<=20;$i++){
			$linea.=' ';
		}
		$registro .= $linea."\r\n";
	}*/
	$registro = mb_convert_encoding($registro, "ISO-8859-1");;
	///***CREACIÓN DEL ARCHIVO TXT***
	if(file_put_contents($archivo,$registro)){
		echo "Archivo Creado exitosamente";
	}else{
		echo "Fallo al crear el archivo txt";
	}
	///***CREACIÓN DEL ARCHIVO TXT***



	//************************************************
	//*                FUNCIONES                     *
	//************************************************

	//TIPO   I: Rellanan datos de coma flotante con "0" por delante y en los decimales de no poseerlos.
	//TIPO  II: Rellenan con "0" a la izquierda de las cifras enteras.
	//TIPO III: Rellenan  con espacios en blanco " " la parte restante de la cadena.
	
	function rellena_total($a){ //TIPO I
		$numero = explode(".", $a);
		$cadena = '';
		for ($i=1;$i<=(15-strlen($numero[0]));$i++){
			$cadena = $cadena . '0';
		}
		$cadena .= $numero[0];
		if (!isset($numero[1])){
			$cadena .= '00';
		}else{
			if (strlen($numero[1]) < 2){
				$cadena .= $numero[1].'0';
			}else{
				$cadena.=$numero[1];
			}
		}
		return $cadena;

	}

	function rellena_lote($lote){  //TIPO II
		$cadena = '';
		for ($i=1;$i<=(9-strlen($lote));$i++){
			$cadena = $cadena . '0';
		}
		$cadena .= $lote;
		return $cadena;
	}

	function rellena_pagos($pago){ //TIPO II
		$cadena = '';
		for ($i=1;$i<=(6-strlen($pago));$i++){
			$cadena = $cadena . '0';
		}
		$cadena .= $pago;
		return $cadena;
	}

	function rellena_cedula($cedula){ //TIPO II
		$cadena = '';
		for ($i=1;$i<=(9-strlen($cedula));$i++){
			$cadena = $cadena . '0';
		}
		$cadena .= $cedula;
		return $cadena;
	}

	function rellena_nombre($nomb){ //TIPO III
		$cadena = '';
		for ($i=1;$i<=60-strlen($nomb);$i++){
			$cadena.= ' ';
		}
		return $nomb.$cadena;
	}

	function rellena_desc($desc){ //TIPO III
		$cadena = '';
		for ($i=1;$i<=30-strlen($desc);$i++){
			$cadena.= ' ';
		}
		return $desc.$cadena;
	}

	function rellena_cuenta($cuenta){ //TIPO II
		$cadena = '0116';
		if ($cuenta == ''){
			for ($i=1;$i<=(16-strlen($cuenta));$i++){
				$cadena = $cadena . '0';
			}
			$cadena .= $cuenta;
			return $cadena;
		}
		return $cuenta;
	}

	function rellena_monto($a){ //TIPO I
		$numero = explode(".", $a);
		$cadena = '';
		for ($i=1;$i<=(13-strlen($numero[0]));$i++){
			$cadena = $cadena . '0';
		}
		$cadena .= $numero[0];
		if (!isset($numero[1])){
			$cadena .= '00';
		}else{
			if (strlen($numero[1]) < 2){
				$cadena .= $numero[1].'0';
			}else{
				$cadena.=$numero[1];
			}
		}
		return $cadena;

	}

	function rellena_email($email){ //TIPO III
		$cadena = '';
		for ($i=1;$i<=40-strlen($email);$i++){
			$cadena.= ' ';
		}
		return $email.$cadena;
	}

	function rellena_telf($telf){ //TIPO II
		$cadena = '';
		for ($i=1;$i<=(11-strlen($telf));$i++){
			$cadena = $cadena . '0';
		}
		$cadena .= $telf;
		return $cadena;
	}
?>