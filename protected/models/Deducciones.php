<?php 
	class Deducciones extends CActiveRecord
	{
		public $id;
		public $sso;
		public $spf;
		public $lph;
		public $inasistencia;


		public function tableName()
		{
			return 'deducciones';
		}
		public function rules(){
			$rules[] = array('sso,spf,lph','required');

			return $rules;
		}

		public function attributeLabels(){
			return array(
				'sso' => 'Seguro Social',
				'spf' => 'Seguro Paro Forzoso',
				'lph' => 'Ley de Política Habitacional'
			);
		}

		public static function model($className=__CLASS__)
		{
			return parent::model($className);
		}
	}
?>