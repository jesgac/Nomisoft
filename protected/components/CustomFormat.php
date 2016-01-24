<?php 
	class CustomFormat extends CFormatter
{
    public function formatPrecio($value){
    	return number_format($value, 2,',','.')." Bs.";
    }
}
?>