<?php 
	class Asignaciones extends CActiveRecord
	{
		public $id;
		public $feriado;
		public $sabado;
		public $horasextra_diurna;
		public $horasextras_nocturna;
		public $b_alimenticio;
		public $asistencia;


		public function rules(){
			$rules[] = array('feriado,sabado,horasextra_diurna,horasextras_nocturna,asistencia,b_alimenticio','required');

			return $rules;
		}


		public function relations()
		{
			// NOTE: you may need to adjust the relation name and the related
			// class name for the relations automatically generated below.
			
		}

		public function attributeLabels(){
			return array(
				'feriado' => 'Feriado',
				'sabado' => 'Sabado',
				'horasextra_diurna' => 'Horas E. Diurnas',
				'horasextras_nocturna' => 'Horas E. Nocturnas',
				'b_alimenticio' => 'Bono Alimenticio',
				'asistencia' => 'Bono de Asistencia'
			);
		}

		public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}


?>