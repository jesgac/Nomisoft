<?php 
	class Nomina extends CActiveRecord
	{
		public $persona_search;
		public $sueldo_search;
		public $id_empleado;
		public $id_asignacion;
		public $otros;
		public $vaciado;
		public $fecha;
		public $descuento;
		public $prestamos;
		public $total_asig;
		public $total_deduc;
		public $neto;

		public function tableName()
		{
			return 'nomina';
		}
		

		public function rules(){
			
			return array(
			array('id_empleado,fecha','required'),
			array('otros,vaciado,descuento,prestamos', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('persona_search, sueldo_search, neto, total_asig, total_deduc', 'safe', 'on'=>'search'),
		);
		}

		public function attributeLabels(){
			return array(

				'id_empleado' => 'Empleado',
				'otros' => 'Varios',
				'vaciado' => 'Vaciado',
				'fecha' => 'Fecha',
				'descuento' => 'Descuento',
				'prestamos' => 'Prestamos',
			);
		}

		public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'empleado' => array(self::BELONGS_TO, 'Empleados', 'id_empleado'),
			'cargo' => array(self::BELONGS_TO, 'Cargos', array('id_cargo'=>'id'),'through'=>'empleado'),
			'empresa' => array(self::BELONGS_TO, 'Empresa', array('id_empresa'=>'id'),'through'=>'empleado'),
			'obra' => array(self::BELONGS_TO, 'Obras', array('id_obra'=>'id'),'through'=>'empleado'),
			'persona' => array(self::BELONGS_TO, 'Personas', array('id_persona'=>'id'),'through'=>'empleado'),
			'asig' => array(self::BELONGS_TO, 'Asignaciones', 'id_asignacion'),
			'deduc' => array(self::BELONGS_TO, 'Deducciones', 'id_deduccion'),

			
		);
	}

		public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->with = array( 'persona', 'cargo' );

		$criteria->compare('id',$this->id);
		$criteria->compare('id_empleado',$this->id_empleado);
		$criteria->compare('total_asig',$this->total_asig);
		$criteria->compare('total_deduc',$this->total_deduc);
		$criteria->compare('neto',$this->neto);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('vaciado',$this->vaciado);
		$criteria->compare('prestamos',$this->prestamos);
		$criteria->compare('otros',$this->otros);
		$criteria->compare('descuento',$this->descuento);
		$criteria->compare( 'persona.nombre', $this->persona_search, true );
		$criteria->compare( 'persona.apellido', $this->persona_search, true, 'OR' );
		$criteria->compare( 'cargo.sueldo', $this->sueldo_search, true );
		//$criteria->order = 'fecha';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort' => array( 'defaultOrder' => 'fecha DESC',
				'attributes'=>array(
		            'persona_search'=>array(
		                'asc'=>'persona.nombre',
		                'desc'=>'persona.nombre DESC',
		            ),
		            'sueldo_search'=>array(
		                'asc'=>'cargo.sueldo',
		                'desc'=>'cargo.sueldo DESC',
		            ),
		            '*',
		        ),

				),
		));
	}

		public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function feriado($dias,$id){
		$empleado = Empleados::model()->findByAttributes(array('id'=>$id));
		$concepto = Conceptos::model()->findByAttributes(array('tipo_bono'=>4));
		$cargo = Cargos::model()->findByAttributes(array('id'=>$empleado->id_cargo));
		
		if ($cargo->tipo_sueldo == 1){
			$semana_mes = 7;
		}else{
			$semana_mes = 30;
		}
		$sueldo_diario = $cargo->sueldo / $semana_mes;
		$feriado = (($sueldo_diario* $concepto->bono) + $sueldo_diario) * $dias;
		return $feriado;
	}

	public function sabado($dias,$id){
		$empleado = Empleados::model()->findByAttributes(array('id'=>$id));
		$concepto = Conceptos::model()->findByAttributes(array('tipo_bono'=>5));
		$cargo = Cargos::model()->findByAttributes(array('id'=>$empleado->id_cargo));
		
		if ($cargo->tipo_sueldo == 1){
			$semana_mes = 7;
		}else{
			$semana_mes = 30;
		}
		$sueldo_diario = $cargo->sueldo / $semana_mes;
		$sabado = (($sueldo_diario* $concepto->bono) + $sueldo_diario) * $dias;
		return $sabado;
	}

	public function b_alimenticio($dias){
		$ut = Conceptos::model()->findByAttributes(array('tipo_bono'=>1));
		$alimenticio = Conceptos::model()->findByAttributes(array('tipo_bono'=>6));
		$b_alimenticio = $ut->bono * $alimenticio->bono * $dias;
		return  $b_alimenticio;

	}

	public function hdiurnas($horas,$id){
		$empleado = Empleados::model()->findByAttributes(array('id'=>$id));
		$cargo = Cargos::model()->findByAttributes(array('id'=>$empleado->id_cargo));
		$concepto = Conceptos::model()->findByAttributes(array('tipo_bono'=>2));
		if ($cargo->tipo_sueldo == 1){
			$semana_mes = 7;
		}else{
			$semana_mes = 30;
		}
		$sueldo_diario = $cargo->sueldo / $semana_mes; // determinar el seuldo diario
		$sueldo_horas =  $sueldo_diario / 8; //determinar la hora de trabajo
		

		$hdiurnas = (($sueldo_horas * $concepto->bono)+ $sueldo_horas) * $horas;
		return $hdiurnas;

	}

	public function hnocturnas($horas,$id){
		$empleado = Empleados::model()->findByAttributes(array('id'=>$id));
		$cargo = Cargos::model()->findByAttributes(array('id'=>$empleado->id_cargo));
		$concepto = Conceptos::model()->findByAttributes(array('tipo_bono'=>3));
		if ($cargo->tipo_sueldo == 1){
			$semana_mes = 7;
		}else{
			$semana_mes = 30;
		}
		$sueldo_diario = $cargo->sueldo / $semana_mes; // determinar el seuldo diario
		$sueldo_horas =  $sueldo_diario / 7; //determinar la hora de trabajo
		
		$hdiurnas = (((($sueldo_horas * $concepto->bono) + $sueldo_horas) * 0.35) + (($sueldo_horas * $concepto->bono) + $sueldo_horas))*$horas;
		return $hdiurnas;

	}

	public function sso($seguro,$id){
		$empleado = Empleados::model()->findByAttributes(array('id'=>$id));
		$cargo = Cargos::model()->findByAttributes(array('id'=>$empleado->id_cargo));
		$concepto = Conceptos::model()->findByAttributes(array('tipo_bono'=>7));
		
		if ($seguro == 0)
			return $seguro;
		else {
			if ($cargo->tipo_sueldo == 1){
				$sueldo= $cargo->sueldo;
			}else{
				$sueldo= $cargo->sueldo /2;
			}
			$sso = $sueldo* ($concepto->bono /100);
			return $sso;
		}
	}

	public function spf($seguro,$id){
		$empleado = Empleados::model()->findByAttributes(array('id'=>$id));
		$cargo = Cargos::model()->findByAttributes(array('id'=>$empleado->id_cargo));
		$concepto = Conceptos::model()->findByAttributes(array('tipo_bono'=>8));
		if ($seguro == 0)
			return $seguro;
		else {
			if ($cargo->tipo_sueldo == 1){
				$sueldo= $cargo->sueldo;
			}else{
				$sueldo= $cargo->sueldo /2;
			}
			$spf = $sueldo* ($concepto->bono /100);
			return $spf;
		}
	}

	public function lph($seguro,$id){
		$empleado = Empleados::model()->findByAttributes(array('id'=>$id));
		$cargo = Cargos::model()->findByAttributes(array('id'=>$empleado->id_cargo));
		$concepto = Conceptos::model()->findByAttributes(array('tipo_bono'=>9));
		if ($seguro == 0)
			return $seguro;
		else {
			if ($cargo->tipo_sueldo == 1){
				$sueldo= $cargo->sueldo;
			}else{
				$sueldo= $cargo->sueldo /2;
			}
			$lph = $sueldo* ($concepto->bono /100);
			return $lph;
		}
	}

	public function inasistencia($dias,$id){
		$empleado = Empleados::model()->findByAttributes(array('id'=>$id));
		$cargo = Cargos::model()->findByAttributes(array('id'=>$empleado->id_cargo));

			if ($cargo->tipo_sueldo == 1){
				$semana_mes = 7;
			}else{
				$semana_mes = 30;
			}
			$sueldo_diario = $cargo->sueldo / $semana_mes;
			$inasistencia = $sueldo_diario * $dias;

		return $inasistencia;
		
	}

	public function asistencia($asistencia,$id){
		$empleado = Empleados::model()->findByAttributes(array('id'=>$id));
		$cargo = Cargos::model()->findByAttributes(array('id'=>$empleado->id_cargo));
		if ($asistencia == 0)
			return $asistencia;
		else {
			if ($cargo->tipo_sueldo == 1){
				$semana_mes = 7;
			}else{
				$semana_mes = 30;
			}
			$sueldo_diario = $cargo->sueldo / $semana_mes;
			$asistencia = $sueldo_diario * 6;
			return $asistencia;
		}
	}


}

?>