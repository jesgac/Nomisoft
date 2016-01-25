<?php

/**
 * This is the model class for table "obras".
 *
 * The followings are the available columns in table 'obras':
 * @property integer $id
 * @property string $nombre_obra
 * @property string $direccion
 * @property string $fech_ini
 * @property string $fech_fin
 * @property integer $status
 */
class Obras extends CActiveRecord
{
	private static $_items=array();
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'obras';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_obra, direccion, fech_ini, status', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('nombre_obra', 'length', 'max'=>45),
			array('direccion', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre_obra, direccion, fech_ini, fech_fin, status', 'safe', 'on'=>'search'),
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
			'nombre_obra' => 'Nombre Obra',
			'direccion' => 'Direccion',
			'fech_ini' => 'Fecha Ini',
			'fech_fin' => 'Fecha Fin',
			'status' => 'Estatus',
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
		$criteria->compare('nombre_obra',$this->nombre_obra,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('fech_ini',$this->fech_ini,true);
		$criteria->compare('fech_fin',$this->fech_fin,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort' => array( 'defaultOrder' => 'nombre_obra ASC'),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Obras the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getOnoffs()
{
	return array(
	    array('id'=>'1', 'title'=>'Activa'),
	    array('id'=>'2', 'title'=>'Inactiva'),
	);
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
	 $criteria->order = 'nombre_obra';
	 $models=self::model()->findAll($criteria);
	 self::$_items[$tipo][""]="Seleccione la Obra"; // Descomentar para incluir un campo en blanco al inicio, para cuando el campo puede ser nulo
	 foreach($models as $model)
	  self::$_items[$tipo][$model->id]=$model->nombre_obra;
	}
}
