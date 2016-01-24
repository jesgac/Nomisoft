<?php

/**
 * This is the model class for table "tallas".
 *
 * The followings are the available columns in table 'tallas':
 * @property integer $id
 * @property string $talla_zapato
 * @property string $talla_pantalon
 * @property string $talla_camisa
 */
class Tallas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tallas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('talla_zapato, talla_pantalon, talla_camisa', 'length', 'max'=>3),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, talla_zapato, talla_pantalon, talla_camisa', 'safe', 'on'=>'search'),
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
			'talla_zapato' => 'Talla Zapato',
			'talla_pantalon' => 'Talla Pantalon',
			'talla_camisa' => 'Talla Camisa',
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
		$criteria->compare('talla_zapato',$this->talla_zapato,true);
		$criteria->compare('talla_pantalon',$this->talla_pantalon,true);
		$criteria->compare('talla_camisa',$this->talla_camisa,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tallas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
