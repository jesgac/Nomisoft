<?php

/**
 * This is the model class for table "personas".
 *
 * The followings are the available columns in table 'personas':
 * @property integer $id
 * @property string $nombre
 * @property string $apellido
 * @property string $cedula
 * @property string $fecha_nac
 * @property string $lugar_nac
 * @property string $nacionalidad
 * @property string $sexo
 * @property string $direccion
 * @property string $telefono
 * @property string $email
 */
class Personas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'personas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, apellido, cedula, fecha_nac, lugar_nac, nacionalidad, sexo, direccion, telefono, email', 'required'),
			array('cedula','numerical'),
			array('nombre, apellido, email', 'length', 'max'=>50),
			array('cedula', 'length', 'max'=>15),
			array('nacionalidad, sexo', 'length', 'max'=>1),
			array('telefono', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, apellido, cedula, fecha_nac, lugar_nac, nacionalidad, sexo, direccion, telefono, email', 'safe', 'on'=>'search'),
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
			'empleados' => array(self::HAS_MANY, 'Empleados', 'id_persona',),
			'hijos' => array(self::HAS_MANY, 'Hijos', 'id_persona'),
			'cargos' => array(self::HAS_MANY, 'Cargos', array('id_cargo'=>'id'),'through'=>'empleados'),
			'obras' => array(self::HAS_MANY, 'Obras', array('id_obra'=>'id'),'through'=>'empleados'),
			'empresas' => array(self::HAS_MANY, 'Empresa', array('id_empresa'=>'id'),'through'=>'empleados'),
			'tallas' => array(self::HAS_MANY, 'Tallas', array('id_talla'=>'id'),'through'=>'empleados'),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'apellido' => 'Apellido',
			'cedula' => 'Cedula',
			'fecha_nac' => 'Fecha Nac',
			'lugar_nac' => 'Lugar Nac',
			'nacionalidad' => 'Nacionalidad',
			'sexo' => 'Sexo',
			'direccion' => 'Direccion',
			'telefono' => 'Telefono',
			'email' => 'Email',
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
		$criteria->with = array('empleados');
		$criteria->compare('id',$this->id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('cedula',$this->cedula,true);
		$criteria->compare('fecha_nac',$this->fecha_nac,true);
		$criteria->compare('lugar_nac',$this->lugar_nac,true);
		$criteria->compare('nacionalidad',$this->nacionalidad,true);
		$criteria->compare('sexo',$this->sexo,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Personas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getObras()
	{
		$text = 'Sin Cuenta';
		if(!empty($this->empleados)) // if this Author has any related Posts
		{
		    $counter = 0;
		    foreach($this->empleados as $emple)
		    {
		        if($counter == 0) 
		           $text = $emple->nro_cuenta;
		        else
		           $text .= ', ' . $emple->nro_cuenta;
		    }
		}
		return $text;    
	}

	public function getNacionalidad()
	{
		if($this->nacionalidad=='V')
			return "Venezolano";
		if($this->nacionalidad=='E')
			return "Extranjero";
	}

	public function getHijos(){
		$text = "<tr>
		<td colspan='4'>N/A</td>
		<td colspan='2'>N/A</td>
		<td>N/A</td>
		</tr>";
		if(!empty($this->hijos))
		{
			$text = '';
		    foreach($this->hijos as $hijo)
		    {
		        $text .= "<tr>
				<td colspan='4'>".$hijo->nombre." ".$hijo->apellido."</td>
				<td colspan='2'>".date('d-m-Y',strtotime($hijo->fecha_nac))."</td>
				<td>".calculaEdad($hijo->fecha_nac)."</td>
				</tr>";
		    }
		}
		return $text;	
	}

	public function calculaedad($fechanacimiento){
	list($ano,$mes,$dia) = explode("-",$fechanacimiento);
	$ano_diferencia  = date("Y") - $ano;
	$mes_diferencia = date("m") - $mes;
	$dia_diferencia   = date("d") - $dia;
	
	if ($mes_diferencia <= 0){
		if($dia_diferencia < 0)
			$ano_diferencia--;
	}

	return $ano_diferencia;
	}

	public function getCargo(){
		$text = 'Sin Cargo';
		if(!empty($this->cargos)) 
		{
			foreach($this->cargos as $cargo)
		    {
		        $text = $cargo->cargo;
		    }
		}
		return $text;  
	}

	public function getObra(){
		$text = 'Sin Obra';
		if(!empty($this->obras)) 
		{
			foreach($this->obras as $obra)
		    {
		        $text = $obra->nombre_obra;
		    }
		}
		return $text;  
	}

	public function getEmpresa(){
		$text = 'Sin Obra';
		if(!empty($this->empresas)) 
		{
			foreach($this->empresas as $empre)
		    {
		        $text = $empre->nombre_emp;
		    }
		}
		return $text;  
	}

	public function getSueldo(){
		if(!empty($this->cargos)) 
		{
			foreach($this->cargos as $cargo)
		    {
		        if ($cargo->tipo_sueldo == 1)
					return "Semanal";
				else
					return "Quincenal";
		    }
		}
	}

	public function geEmpleado(){
		if(!empty($this->cargos)) 
		{
			foreach($this->cargos as $cargo)
		    {
		        if ($cargo->tipo_empleado == 1)
					return "Obrero";
				else
					return "Empleado";
		    }
		}
	}

	public function getTallas(){
		$text = "<tr>
		<td colspan='3' class='center'>N/A</td>
		<td colspan='2' class='center'>N/A</td>
		<td colspan='2' class='center'>N/A</td>
		</tr>";
		if(!empty($this->tallas))
		{
			$text = '';
		    foreach($this->tallas as $talla)
		    {
		        $text .= "<tr>
				<td colspan='3' class='center'>".$talla->talla_camisa."</td>
				<td colspan='2' class='center'>".$talla->talla_pantalon."</td>
				<td colspan='2' class='center'>".$talla->talla_zapato."</td>
				</tr>";
		    }
		}
		return $text;  
	}
	public function getSexo(){
		if ($this->sexo=="M")
			return "Masculino";
		else
			return "Femenino";
	}

}
