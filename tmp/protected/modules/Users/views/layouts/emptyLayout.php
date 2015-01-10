<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        ===
        This comment should NOT be removed.

        Charisma v2.0.0

        Copyright 2012-2014 Muhammad Usman
        Licensed under the Apache License v2.0
        http://www.apache.org/licenses/LICENSE-2.0

        http://usman.it
        http://twitter.com/halalit_usman
        ===
    -->
    <meta charset="utf-8">
    <title>Free HTML5 Bootstrap Admin Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">

    <!-- The styles -->
    <?php Yii::app()->getClientScript()->registerCssFile($this->assetsBase.'/css/bootstrap-cerulean.min.css'); ?>
    <?php Yii::app()->getClientScript()->registerCssFile($this->assetsBase.'/css/charisma-app.css'); ?>
    <link id="bs-css" href="<?php echo $this->assetsBase; ?>/css/bootstrap-cerulean.min.css" rel="stylesheet">
    <?php Yii::app()->getClientScript()->registerCssFile($this->assetsBase.'/bower_components/fullcalendar/dist/fullcalendar.css'); ?>
    <?php Yii::app()->getClientScript()->registerCssFile($this->assetsBase.'/bower_components/fullcalendar/dist/fullcalendar.print.css'); ?>
    <?php Yii::app()->getClientScript()->registerCssFile($this->assetsBase.'/bower_components/chosen/chosen.min.css'); ?>
    <?php Yii::app()->getClientScript()->registerCssFile($this->assetsBase.'/bower_components/colorbox/example3/colorbox.css'); ?>
    <?php Yii::app()->getClientScript()->registerCssFile($this->assetsBase.'/bower_components/responsive-tables/responsive-tables.css'); ?>
    <?php Yii::app()->getClientScript()->registerCssFile($this->assetsBase.'/bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css'); ?>
    <?php Yii::app()->getClientScript()->registerCssFile($this->assetsBase.'/css/jquery.noty.css'); ?>
    <?php Yii::app()->getClientScript()->registerCssFile($this->assetsBase.'/css/noty_theme_default.css'); ?>
    <?php Yii::app()->getClientScript()->registerCssFile($this->assetsBase.'/css/elfinder.min.css'); ?>
    <?php Yii::app()->getClientScript()->registerCssFile($this->assetsBase.'/css/elfinder.theme.css'); ?>
    <?php Yii::app()->getClientScript()->registerCssFile($this->assetsBase.'/css/jquery.iphone.toggle.css'); ?>
    <?php Yii::app()->getClientScript()->registerCssFile($this->assetsBase.'/css/uploadify.css'); ?>
    <?php Yii::app()->getClientScript()->registerCssFile($this->assetsBase.'/css/animate.min.css'); ?>
    <?php Yii::app()->getClientScript()->registerCssFile($this->assetsBase.'/css/custom_style.css'); ?>

    <!-- jQuery -->

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="<?php echo $this->assetsBase; ?>/img/favicon.ico">

</head>

<body>
    <!-- topbar starts -->
    <?php echo $content; ?>
	
<?php Yii::app()->clientScript->registerCoreScript('jquery',CClientScript::POS_END);?>
<!-- external javascript -->
<?php Yii::app()->getClientScript()->registerScriptFile($this->assetsBase.'/bower_components/bootstrap/dist/js/bootstrap.min.js',CClientScript::POS_END); ?>

<!-- library for cookie management -->
<?php Yii::app()->getClientScript()->registerScriptFile($this->assetsBase.'/js/jquery.cookie.js',CClientScript::POS_END); ?>
<!-- calender plugin -->
<?php Yii::app()->getClientScript()->registerScriptFile($this->assetsBase.'/bower_components/moment/min/moment.min.js',CClientScript::POS_END); ?>
<?php Yii::app()->getClientScript()->registerScriptFile($this->assetsBase.'/bower_components/fullcalendar/dist/fullcalendar.min.js',CClientScript::POS_END); ?>
<!-- data table plugin -->
<?php Yii::app()->getClientScript()->registerScriptFile($this->assetsBase.'/js/jquery.dataTables.min.js',CClientScript::POS_END); ?>

<!-- select or dropdown enhancer -->
<?php Yii::app()->getClientScript()->registerScriptFile($this->assetsBase.'/bower_components/chosen/chosen.jquery.min.js',CClientScript::POS_END); ?>
<!-- plugin for gallery image view -->
<?php Yii::app()->getClientScript()->registerScriptFile($this->assetsBase.'/bower_components/colorbox/jquery.colorbox-min.js',CClientScript::POS_END); ?>
<!-- notification plugin -->
<?php Yii::app()->getClientScript()->registerScriptFile($this->assetsBase.'/js/jquery.noty.js',CClientScript::POS_END); ?>
<!-- library for making tables responsive -->
<?php Yii::app()->getClientScript()->registerScriptFile($this->assetsBase.'/bower_components/responsive-tables/responsive-tables.js',CClientScript::POS_END); ?>
<!-- tour plugin -->
<?php Yii::app()->getClientScript()->registerScriptFile($this->assetsBase.'/bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js',CClientScript::POS_END); ?>
<!-- star rating plugin -->
<?php Yii::app()->getClientScript()->registerScriptFile($this->assetsBase.'/js/jquery.raty.min.js',CClientScript::POS_END); ?>
<!-- for iOS style toggle switch -->
<?php Yii::app()->getClientScript()->registerScriptFile($this->assetsBase.'/js/jquery.iphone.toggle.js',CClientScript::POS_END); ?>

<?php Yii::app()->getClientScript()->registerScriptFile($this->assetsBase.'/js/jquery.autogrow-textarea.js',CClientScript::POS_END); ?>
<!-- multiple file upload plugin -->
<?php Yii::app()->getClientScript()->registerScriptFile($this->assetsBase.'/js/jquery.uploadify-3.1.min.js',CClientScript::POS_END); ?>
<!-- history.js for cross-browser state change on ajax -->
<?php Yii::app()->getClientScript()->registerScriptFile($this->assetsBase.'/js/jquery.history.js',CClientScript::POS_END); ?>
<!-- application script for Charisma demo -->
<?php Yii::app()->getClientScript()->registerScriptFile($this->assetsBase.'/js/charisma.js',CClientScript::POS_END); ?>


</body>
</html>
