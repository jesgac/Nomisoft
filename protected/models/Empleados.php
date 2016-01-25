<?php

/**
 * This is the model class for table "empleados".
 *
 * The followings are the available columns in table 'empleados':
 * @property integer $id
 * @property integer $id_persona
 * @property string $obra
 * @property string $nro_cuenta
 * @property integer $id_empresa
 * @property integer $id_talla
 * @property integer $id_cargo
 * @property string $cod_banco
 * @property string $tipo_empleado
 */
class Empleados extends CActiveRecord
{
	public $persona_search;
	public $persona_search_2;
	public $obra_search;
	public $empresa_search;
	public $camisa_search;
	public $pantalon_search;
	public $zapato_search;
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
			array('id_persona, id_obra,  id_empresa, id_cargo,  tipo_empleado', 'required'),
			array('id_persona, id_empresa, id_talla, id_cargo,nro_cuenta', 'numerical', 'integerOnly'=>true),
			array('id_obra', 'length', 'max'=>50),
			array('id_persona', 'unique','message'=>'Este empleado ya existe'),
			array('nro_cuenta', 'length', 'max'=>20),
			array('cod_banco', 'length', 'max'=>4),
			array('tipo_empleado', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_persona, id_obra, nro_cuenta, id_empresa, id_talla, id_cargo, cod_banco, tipo_empleado,persona_search,persona_search_2,obra_search,empresa_search,camisa_search,pantalon_search,zapato_search', 'safe', 'on'=>'search'),
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
			'obra' => array(self::BELONGS_TO, 'Obras', 'id_obra'),
			'empresa' => array(self::BELONGS_TO, 'Empresa', 'id_empresa'),
			'talla' => array(self::BELONGS_TO, 'Tallas', 'id_talla'),
			'cargo' => array(self::BELONGS_TO, 'Cargos', 'id_cargo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_persona' => 'Persona',
			'id_obra' => 'Obra',
			'nro_cuenta' => 'Nro Cuenta',
			'id_empresa' => 'Empresa',
			'id_talla' => 'Talla',
			'id_cargo' => 'Cargo',
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
		$criteria->with = array( 'persona','obra','empresa','talla');
		$criteria->compare('id',$this->id);
		$criteria->compare('id_persona',$this->id_persona);
		$criteria->compare('id_obra',$this->id_obra,true);
		$criteria->compare('nro_cuenta',$this->nro_cuenta,true);
		$criteria->compare('id_empresa',$this->id_empresa);
		$criteria->compare('id_talla',$this->id_talla);
		$criteria->compare('id_cargo',$this->id_cargo);
		$criteria->compare('cod_banco',$this->cod_banco,true);
		$criteria->compare('tipo_empleado',$this->tipo_empleado,true);
		$criteria->compare( 'persona.nombre', $this->persona_search, true );
		$criteria->compare( 'persona.apellido', $this->persona_search_2, true );
		$criteria->compare( 'obra.nombre_obra', $this->obra_search, true );
		$criteria->compare( 'empresa.nombre_emp', $this->empresa_search, true );
		$criteria->compare( 'talla.talla_zapato', $this->zapato_search, true );
		$criteria->compare( 'talla.talla_pantalon', $this->pantalon_search, true );
		$criteria->compare( 'talla.talla_camisa', $this->camisa_search, true );

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
		        'defaultOrder' => 'persona.nombre ASC',
		        'attributes'=>array(
		            'persona_search'=>array(
		                'asc'=>'persona.nombre',
		                'desc'=>'persona.nombre DESC',
		            ),
		            'persona_search_2'=>array(
		                'asc'=>'persona.apellido',
		                'desc'=>'persona.apellido DESC',
		            ),
		            'obra_search'=>array(
		                'asc'=>'obra.nombre_obra',
		                'desc'=>'obra.nombre_obra DESC',
		            ),
		            'empresa_search'=>array(
		                'asc'=>'empresa.nombre_emp',
		                'desc'=>'empresa.nombre_emp DESC',
		            ),
		            'camisa_search'=>array(
		                'asc'=>'talla.talla_camisa',
		                'desc'=>'talla.talla_camisa DESC',
		            ),
		            'pantalon_search'=>array(
		                'asc'=>'talla.talla_pantalon',
		                'desc'=>'talla.talla_pantalon DESC',
		            ),
		            'zapato_search'=>array(
		                'asc'=>'talla.talla_zapato',
		                'desc'=>'talla.talla_zapato DESC',
		            ),


		            '*',
		        ),
   			 ),
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
