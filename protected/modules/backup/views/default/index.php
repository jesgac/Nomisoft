<?php
$this->breadcrumbs=array(
	'Manage'=>array('index'),
);


?>


<?php $this->renderPartial('_list', array(
		'dataProvider'=>$dataProvider,
));
?>

