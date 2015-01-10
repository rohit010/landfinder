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
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"> <img alt="Charisma Logo" src="<?php echo $this->assetsBase; ?>/img/logo20.png" class="hidden-xs"/>
                <span>Charisma</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> admin</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="login.html">Logout</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->

            <!-- theme selector starts -->
            <div class="btn-group pull-right theme-container animated tada">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-tint"></i><span
                        class="hidden-sm hidden-xs"> Change Theme / Skin</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" id="themes">
                    <li><a data-value="classic" href="#"><i class="whitespace"></i> Classic</a></li>
                    <li><a data-value="cerulean" href="#"><i class="whitespace"></i> Cerulean</a></li>
                    <li><a data-value="cyborg" href="#"><i class="whitespace"></i> Cyborg</a></li>
                    <li><a data-value="simplex" href="#"><i class="whitespace"></i> Simplex</a></li>
                    <li><a data-value="darkly" href="#"><i class="whitespace"></i> Darkly</a></li>
                    <li><a data-value="lumen" href="#"><i class="whitespace"></i> Lumen</a></li>
                    <li><a data-value="slate" href="#"><i class="whitespace"></i> Slate</a></li>
                    <li><a data-value="spacelab" href="#"><i class="whitespace"></i> Spacelab</a></li>
                    <li><a data-value="united" href="#"><i class="whitespace"></i> United</a></li>
                </ul>
            </div>
            <!-- theme selector ends -->

            <ul class="collapse navbar-collapse nav navbar-nav top-menu">
                <li><a href="#"><i class="glyphicon glyphicon-globe"></i> Visit Site</a></li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-star"></i> Dropdown <span
                            class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
                <li>
                    <form class="navbar-search pull-left">
                        <input placeholder="Search" class="search-query form-control col-md-10" name="query"
                               type="text">
                    </form>
                </li>
            </ul>

        </div>
    </div>
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">
        
        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">Main</li>
                        <li>
                        	<a class="ajax-link" href="index"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a>
                        </li>
                         <li>
                        	<a class="ajax-link" href="AddUser"><i class="glyphicon glyphicon-edit"></i><span> Add User</span></a>
                        </li>
                        <li>
                        	<a class="ajax-link" href="AddProperty"><i class="glyphicon glyphicon-edit"></i><span> Add Property</span></a>
                        </li>
                        <li>
                        	<a class="ajax-link" href="ManageProperties"><i class="glyphicon glyphicon-align-justify"></i><span> Manage Properties</span></a>
                        </li>
                    </ul>
                    <!-- <label id="for-is-ajax" for="is-ajax"><input id="is-ajax" type="checkbox"> Ajax on menu</label> -->
                </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->

        <noscript>
            <div class="alert alert-block col-md-12">
                <h4 class="alert-heading">Warning!</h4>

                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                    enabled to use this site.</p>
            </div>
        </noscript>

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Dashboard</a>
        </li>
    </ul>
</div>



<div class="row">
	<div class="col-xs-12">
    <?php echo $content; ?>
	</div>
</div><!--/row-->
    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->



    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Settings</h3>
                </div>
                <div class="modal-body">
                    <p>Here settings can be configured...</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                    <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
                </div>
            </div>
        </div>
    </div>

    <footer class="row">
        <p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy; <a href="http://usman.it" target="_blank">Muhammad
                Usman</a> 2012 - 2014</p>
        <p class="col-md-3 col-sm-3 col-xs-12 powered-by">Powered by: <a
                href="http://usman.it/free-responsive-admin-template">Charisma</a></p>
    </footer>

</div><!--/.fluid-container-->
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
