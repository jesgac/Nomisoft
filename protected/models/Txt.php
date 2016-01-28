<?php 
	class Txt extends CFormModel 
{

    public $fecha;
    public $rif;
    public $contrato;
      

    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('fecha,rif,contrato', 'required'),
            array('contrato','numerical','integerOnly'=>true)
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
                'fecha'=>'Fecha',
                'rif'=>'RIF',
                'contrato'=>'Numero de Contrato',
                
        );
    }

}

?>