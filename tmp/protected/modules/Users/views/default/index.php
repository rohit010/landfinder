<?php $Smsgs =  Yii::app()->user->getFlash('sucess');
$Emsgs  =  Yii::app()->user->getFlash('error');
if($Smsgs!=""){ ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Well done!</strong> <?= $Smsgs; ?>
	</div>
<?php } if($Emsgs!=""){ ?>
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Oops!</strong> <?= $Emsgs; ?>
	</div>
<?php } ?>