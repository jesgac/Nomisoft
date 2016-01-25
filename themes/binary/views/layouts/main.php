<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nomina: Promotora RL 2006 C.A </title>
	<!-- BOOTSTRAP STYLES-->
    <link href="<?php echo Yii::app()->baseUrl; ?>/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="<?php echo Yii::app()->baseUrl; ?>/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="<?php echo Yii::app()->baseUrl; ?>/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" style="padding:0px;background-color:#428bca"><img src="<?php echo Yii::app()->baseUrl; ?>/images/logo.png" alt=""></a> 
            </div>
 <?php if (Yii::app()->user->getState('role') ==3)
    echo"
<div style='color: white;
padding: 20px 50px 0px 0px;
float: right;'><a href='index.php?r=backup' class=' fa fa-download fa-2x' style='color:white;text-decoration:none'></a> </div>";?>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"><a href="index.php?r=site/logout" class="btn btn-primary square-btn-adjust">Salir (<?php echo Yii::app()->user->name?>)</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a  href="index.php"><i class="fa fa-home"></i>Inicio</a>
                    </li>                    
                    <?php if (Yii::app()->user->getState('role') ==1||Yii::app()->user->getState('role') ==3) //Role
                    echo "
                    <li>
                    <a><i class='fa fa-industry'></i>Datos Constructora<span class='fa'></span></a>
                    <ul class='nav nav-second-level'>
                        <li>
                            <a href='index.php?r=empresa/admin'>Empresa</a>
                        </li>
                        <li>
                            <a href='index.php?r=obras/admin'>Obra</a>
                        </li>
                    </ul>
                    </li>
                    ";?>
                    <li>
                        <a><i class="fa fa-male"></i>Datos Personales<span class="fa user"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="index.php?r=personas/admin">Personas</a>
                            </li>
                            
                            <li>
                                <a href='index.php?r=hijos/admin'>Hijos</a>
                            </li>;
                            ?>
                        </ul>
                      </li>
                    <li>
                    <li>
                    <a><i class='fa fa-building'></i>Datos Empresariales<span class='fa'></span></a>
                    <ul class='nav nav-second-level'>
                        <li>
                            <a href='index.php?r=empleados/admin'>Trabajador</a>
                        </li>
                    </ul>
                    </li>
                    ;?>
                    <?php 
                     if (Yii::app()->user->getState('role') ==1||Yii::app()->user->getState('role') ==3) //Role
                     echo "
                    <li>
                        <a  href='index.php?r=conceptos/admin'><i class='fa fa-usd'></i>Conceptos</a>
                    </li>
                    ";?>

                    <li>
                        <a  href="index.php?r=nomina/admin"><i class="fa fa-calculator"></i>Nómina</a>
                    </li>
                    <?php 
                    if (Yii::app()->user->getState('role') ==3) //Role
                    echo "
                    <li>
                        <a  href='index.php?r=usuario/admin'><i class='fa fa-expeditedssl'></i>Usuarios</a>
                    </li>
                    ";?>
                        
                  </li>    
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" style="background-color: gray;
background-image: linear-gradient(90deg, transparent 50%, rgba(255,255,255,.5) 50%);
background-size: 10px 10px">
            <div id="page-inner">

                <?php if(isset($this->breadcrumbs)):?>
            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                'links'=>$this->breadcrumbs,
                'homeLink'=>false,
                'tagName'=>'ul',
                'separator'=>'',
                'activeLinkTemplate'=>'<li><a href="{url}">{label}</a> <span class="divider">/</span></li>',
                'inactiveLinkTemplate'=>'<li><span>{label}</span></li>',
                'htmlOptions'=>array ('class'=>'breadcrumb')
            )); ?>
        <!-- breadcrumbs -->
      <?php endif?>
                <div class="row">
                    <?php echo $content; ?>
                </div>
                 <!-- /. ROW  -->
                 <hr />
            </div>
             <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->

    <?php Yii::app()->clientScript->registerCoreScript('jquery')?>
    <!-- BOOTSTRAP SCRIPTS -->
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/bootstrap.min.js'); ?>
    <!-- METISMENU SCRIPTS -->
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.metisMenu.js'); ?>
        

    
   
</body>
</html>
