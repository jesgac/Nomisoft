<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="<?php echo Yii::app()->baseUrl; ?>/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="<?php echo Yii::app()->baseUrl; ?>/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="<?php echo Yii::app()->baseUrl; ?>/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<style>
  .content {
  background-color: #428bca;
  border-radius: 2px;
  box-shadow: 0 4px 6px 1px rgba(50, 50, 50, 0.14);
  box-sizing: border-box;
  color: black;
  line-height: 1.5;
  margin: 20px auto 0;
  max-width: 640px;
  padding: 15px 35px 30px 37px;
  width: 100%;
}

</style>
</head>
<body background="<?php echo Yii::app()->baseUrl; ?>/images/crossword.png">
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="content">
                  <img src="<?php echo Yii::app()->baseUrl; ?>/images/login.png" alt="" width="100%">
                </div>
            </div>
        </div>
        <br>
         <div class="row ">
               
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>Ingrese sus datos</strong>  
                            </div>
                            <div class="panel-body">
                                <?php $form=$this->beginWidget('CActiveForm', array(
                                  'id'=>'login-form',
                                  'enableClientValidation'=>true,
                                  'clientOptions'=>array(
                                    'validateOnSubmit'=>true,
                                  ),
                                )); ?>
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <?php echo $form->textField($model,'username',array('class'=>'form-control', 'placeholder'=>'Usuario','required'=>'required')); ?>
                                        </div>
                                                                              <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <?php echo $form->passwordField($model,'password',array('class'=>'form-control', 'placeholder'=>'Password','required'=>'required')); ?>
                                        </div>
                                        <?php echo $form->error($model,'password',array('class'=>'alert alert-info')); ?>
                                     <?php echo CHtml::submitButton('Login',array('class'=>'btn btn-primary btn-block')); ?>
                                <?php $this->endWidget(); ?> 
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>


     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo Yii::app()->baseUrl; ?>/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="<?php echo Yii::app()->baseUrl; ?>/js/custom.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-38955291-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
