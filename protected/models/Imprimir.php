<?php 
	class Imprimir extends CFormModel 
{

    public $fecha;
      

    public function rules() {

            $rules[] = array('fecha', 'required');
            

            return $rules;
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
            return array(
                    'fecha'=>'Fecha',
                    
            );
    }

}

?>