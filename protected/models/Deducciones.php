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
		public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sso,spf,lph','required'),
			array('sso,spf,lph,inasistencia', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			//array('id, b_alimenticio, asistencia, feriado, sabado, horasextra_diurna, horasextras_nocturna', 'safe', 'on'=>'search'),
		);
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