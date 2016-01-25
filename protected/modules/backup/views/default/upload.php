<?php
$this->breadcrumbs=array(
	'backup'=>array('backup'),
	'Upload',
);?>

<div class="workplace">
            
            <div class="row-fluid">
                
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Subir Respaldo</h1>
                         
                    </div>
                    <div class="block-fluid"> 
<!--<h1><?php echo $this->action->id; ?></h1>-->


<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'install-form',
	'enableAjaxValidation' => true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
));
?>
		
		<?php echo $form->labelEx($model,'upload_file'); ?>
		<?php echo $form->fileField($model,'upload_file'); ?>
		<?php echo $form->error($model,'upload_file'); ?>
		
		<div class="row-form clearfix">
<?php
	echo CHtml::submitButton(Yii::t('app', 'Save'));
	$this->endWidget();
?>
</div>
</div>
                </div>
                
            </div>
            
            <div class="dr"><span></span></div>