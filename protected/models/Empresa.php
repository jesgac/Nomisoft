<?php

/**
 * This is the model class for table "empresa".
 *
 * The followings are the available columns in table 'empresa':
 * @property integer $id
 * @property string $nombre_emp
 * @property string $direccion
 * @property string $telefono
 * @property string $rif
 */
class Empresa extends CActiveRecord
{
	private static $_items=array();
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'empresa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_emp, direccion, telefono, rif', 'required'),
			array('nombre_emp', 'length', 'max'=>100),
			array('rif', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre_emp, direccion, telefono, rif', 'safe', 'on'=>'search'),
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
			'nombre_emp' => 'Nombre de Empresa',
			'direccion' => 'Direccion',
			'telefono' => 'Telefono',
			'rif' => 'Rif',
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
		$criteria->compare('nombre_emp',$this->nombre_emp,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('rif',$this->rif,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort' => array( 'defaultOrder' => 'nombre_emp ASC'),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Empresa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function items($tipo)
	{
	 // Devuelve todos los ítems que forman el arreglo
	 if(!isset(self::$_items[$tipo]))
	  self::loadItems($tipo);
	 return self::$_items[$tipo];
	}

	public static function item($tipo, $id)
	{
	 // Devuelve el ítem al que le corresponde el id
	 if(!isset(self::$_items[$tipo]))
	  self::loadItems($tipo);
	 return isset(self::$_items[$tipo][$id]) ? self::$_items[$tipo][$id] : false;
	}

	private static function loadItems($tipo)
	{
	 // Obtiene los registros
	 self::$_items[$tipo]=array();
	 $criteria = new CDbCriteria;
	 $criteria->order = 'nombre_emp';
	 $models=self::model()->findAll($criteria);
	 self::$_items[$tipo][""]="Seleccione la Empresa"; // Descomentar para incluir un campo en blanco al inicio, para cuando el campo puede ser nulo
	 foreach($models as $model)
	  self::$_items[$tipo][$model->id]=$model->nombre_emp;
	}
}
