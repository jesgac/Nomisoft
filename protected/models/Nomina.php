<?php 
	class Nomina extends CActiveRecord
	{
		
		public $id_empleado;
		public $id_asignacion;
		public $otros;
		public $vaciado;
		public $fecha;
		public $descuento;
		public $prestamos;

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
			//array('id, b_alimenticio, asistencia, feriado, sabado, horasextra_diurna, horasextras_nocturna', 'safe', 'on'=>'search'),
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
		//$criteria->order = 'fecha';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort' => array( 'defaultOrder' => 'fecha DESC'),
		));
	}

		public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
?>