<?php

/**
 * This is the model class for table "empleados".
 *
 * The followings are the available columns in table 'empleados':
 * @property integer $id
 * @property integer $id_persona
 * @property integer $id_obra
 * @property string $nro_cuenta
 * @property integer $id_empresa
 * @property integer $id_talla
 * @property integer $id_cargo
 * @property string $cod_banco
 * @property integer $tipo_empleado
 */
class Empleados extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'empleados';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_persona, id_obra, nro_cuenta, id_empresa, id_talla, id_cargo, cod_banco, tipo_empleado', 'required'),
			array('id_persona, id_obra, id_empresa, id_talla, id_cargo, tipo_empleado', 'numerical', 'integerOnly'=>true),
			array('nro_cuenta', 'length', 'max'=>20),
			array('cod_banco', 'length', 'max'=>4),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_persona, id_obra, nro_cuenta, id_empresa, id_talla, id_cargo, cod_banco, tipo_empleado', 'safe', 'on'=>'search'),
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
			'persona' => array(self::BELONGS_TO, 'Personas', 'id_persona'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_persona' => 'Id Persona',
			'id_obra' => 'Id Obra',
			'nro_cuenta' => 'Nro Cuenta',
			'id_empresa' => 'Id Empresa',
			'id_talla' => 'Id Talla',
			'id_cargo' => 'Id Cargo',
			'cod_banco' => 'Cod Banco',
			'tipo_empleado' => 'Tipo Empleado',
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
		$criteria->compare('id_persona',$this->id_persona);
		$criteria->compare('id_obra',$this->id_obra);
		$criteria->compare('nro_cuenta',$this->nro_cuenta,true);
		$criteria->compare('id_empresa',$this->id_empresa);
		$criteria->compare('id_talla',$this->id_talla);
		$criteria->compare('id_cargo',$this->id_cargo);
		$criteria->compare('cod_banco',$this->cod_banco,true);
		$criteria->compare('tipo_empleado',$this->tipo_empleado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Empleados the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
