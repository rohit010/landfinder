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
<div class="row">
	<div class="col-xs-8 col-xs-offset-2">
		<div class="form">
		
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'users-addUser-form',
			// Please note: When you enable ajax validation, make sure the corresponding
			// controller action is handling ajax validation correctly.
			// See class documentation of CActiveForm for details on this,
			// you need to use the performAjaxValidation()-method described there.
		    'enableAjaxValidation'=>true,
		    'clientOptions'=>array(
		      	'validateOnSubmit'=>true,
		     ),
			'htmlOptions' => array('enctype' => 'multipart/form-data'),
		)); ?>
		
			<p class="note">Fields with <span class="required">*</span> are required.</p>
		
			<?php //echo $form->errorSummary($model); ?>
		
			<div class="form-group">
				<?php echo $form->labelEx($model,'first_name'); ?>
				<?php echo $form->textField($model,'first_name',array('class'=>'form-control input-sm input-sm','placeholder'=>'Enter First Name')); ?>
				<?php echo $form->error($model,'first_name'); ?>
			</div>
		
			<div class="form-group">
				<?php echo $form->labelEx($model,'last_name'); ?>
				<?php echo $form->textField($model,'last_name',array('class'=>'form-control input-sm','placeholder'=>'Enter Last Name')); ?>
				<?php echo $form->error($model,'last_name'); ?>
			</div>
		
			<div class="form-group">
				<?php echo $form->labelEx($model,'password'); ?>
				<?php echo $form->textField($model,'password',array('class'=>'form-control input-sm','placeholder'=>'Enter Password')); ?>
				<?php echo $form->error($model,'password'); ?>
			</div>
			
			<div class="form-group">
				<?php echo $form->labelEx($model,'email'); ?>
				<?php echo $form->textField($model,'email',array('class'=>'form-control input-sm','placeholder'=>'Enter Email Id')); ?>
				<?php echo $form->error($model,'email'); ?>
			</div>
		
			<div class="form-group">
				<?php echo $form->labelEx($model,'mobile_no'); ?>
				<?php echo $form->textField($model,'mobile_no',array('class'=>'form-control input-sm','placeholder'=>'Enter Mobile No')); ?>
				<?php echo $form->error($model,'mobile_no'); ?>
			</div>
			
			<div class="form-group">
				<?php echo $form->labelEx($model,'address'); ?>
				<?php echo $form->textField($model,'address',array('class'=>'form-control input-sm','placeholder'=>'Enter Address')); ?>
				<?php echo $form->error($model,'address'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'user_logo'); ?>
				<?php echo $form->fileField($model, 'user_logo'); ?>
				<?php echo $form->error($model,'user_logo'); ?>
			</div>
		
			<div class="form-group">
				<?php echo $form->labelEx($model,'user_type'); ?>
				<?php echo $form->textField($model,'user_type',array('class'=>'form-control input-sm','placeholder'=>'Enter User Type')); ?>
				<?php echo $form->error($model,'user_type'); ?>
			</div>
		
			<div class="form-group">
				<?php echo CHtml::submitButton('Submit'); ?>
			</div>
		
		<?php $this->endWidget(); ?>
		
		</div><!-- form -->
	</div>
</div>