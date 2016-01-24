<?php

/**
 * This is the model class for table "asignaciones".
 *
 * The followings are the available columns in table 'asignaciones':
 * @property integer $id
 * @property double $b_alimenticio
 * @property double $asistencia
 * @property double $feriado
 * @property double $sabado
 * @property double $horasextra_diurna
 * @property double $horasextras_nocturna
 */
class Asignaciones extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'asignaciones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('b_alimenticio, asistencia, feriado, sabado, horasextra_diurna, horasextras_nocturna', 'required'),
			array('b_alimenticio, asistencia, feriado, sabado, horasextra_diurna, horasextras_nocturna', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			//array('id, b_alimenticio, asistencia, feriado, sabado, horasextra_diurna, horasextras_nocturna', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'b_alimenticio' => 'Bono Alimenticio',
			'asistencia' => 'Asistencia',
			'feriado' => 'Feriado',
			'sabado' => 'Sabado',
			'horasextra_diurna' => 'Horas Extras Diurnas',
			'horasextras_nocturna' => 'Horas Extras Nocturnas',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('b_alimenticio',$this->b_alimenticio);
		$criteria->compare('asistencia',$this->asistencia);
		$criteria->compare('feriado',$this->feriado);
		$criteria->compare('sabado',$this->sabado);
		$criteria->compare('horasextra_diurna',$this->horasextra_diurna);
		$criteria->compare('horasextras_nocturna',$this->horasextras_nocturna);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Asignaciones the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
