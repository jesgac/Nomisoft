<?php

/**
 * This is the model class for table "cargos".
 *
 * The followings are the available columns in table 'cargos':
 * @property integer $id
 * @property string $cargo
 * @property double $sueldo
 * @property integer $tipo_sueldo
 */
class Cargos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cargos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cargo, sueldo, tipo_sueldo', 'required'),
			array('tipo_sueldo', 'numerical', 'integerOnly'=>true),
			array('sueldo', 'numerical'),
			array('cargo', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, cargo, sueldo, tipo_sueldo', 'safe', 'on'=>'search'),
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
			'cargo' => 'Cargo',
			'sueldo' => 'Sueldo',
			'tipo_sueldo' => 'Tipo Sueldo',
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
		$criteria->compare('cargo',$this->cargo,true);
		$criteria->compare('sueldo',$this->sueldo);
		$criteria->compare('tipo_sueldo',$this->tipo_sueldo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort' => array( 'defaultOrder' => 'cargo ASC'),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cargos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getOnoffs()
{
return array(
    array('id'=>'1', 'title'=>'Semanal'),
    array('id'=>'2', 'title'=>'Mensual'),
);
}
public function getOnMensual($onoff)
{
if($onoff == 1) 
    return 'Semanal';
else 
    return 'Off';
}
}
