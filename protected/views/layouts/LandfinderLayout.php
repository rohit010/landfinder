<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<?php Yii::app()->getClientScript()->registerCssFile($this->assetsBase.'/css/style.css'); ?>
	<?php Yii::app()->getClientScript()->registerCssFile($this->assetsBase.'/bootstrap/css/bootstrap.min.css'); ?>
	<?php Yii::app()->getClientScript()->registerCssFile($this->assetsBase.'/css/font-awesome.min.css'); ?>
	<?php Yii::app()->getClientScript()->registerCoreScript('jquery',CClientScript::POS_END); ?>
	<?php Yii::app()->getClientScript()->registerScriptFile($this->assetsBase.'/bootstrap/js/bootstrap.min.js',CClientScript::POS_END); ?>
</head>
<body>
	<header class="header">
		<div class="row top-section">
			<div class="container">
				<div class="col-xs-3 col-md-3 col-sm-4">
					<i class="fa fa-phone"></i> 0844 3878377 / 01702 870878
				</div>
				<div class="col-xs-3 col-md-3 col-sm-4">
					Contact Us 
					<span class="social-icon">
						<i class="fa fa-facebook"></i>
					</span> &nbsp;
					<span class="social-icon">
						<i class="fa fa-twitter"></i>
					</span>
					
				</div>
				<div class="col-xs-3 col-md-4 col-md-offset-2 col-sm-4">
					<ul class="list-inline userinfo">
						<li>Login</li>
						<li>|</li>
						<li>Register</li>
						<li>|</li>
						<li>Select City</li>
					</ul>
					
				</div>
			</div>
		</div>
		<div class="top-bg-color">
			<div class="container">
				<div class="row">
					<div class="col-xs-2 col-xs-offset-1">
						<!-- <img alt="" src="<?php echo $this->assetsBase; ?>/images/logo.jpg"> -->
					</div>
					<div class="col-xs-10"></div>
				</div>
			</div>
		</div>
	</header>
	<div class="container">
		<div class="main-container">
			<?php echo $content; ?>
		</div>
	</div>
</body>
</html>