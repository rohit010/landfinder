<div class="ch-container">
    <div class="row">
        
    <div class="row">
        <div class="col-md-12 center login-header">
            <h2>Welcome to LandFinder</h2>
        </div>
        <!--/span-->
    </div><!--/row-->

    <div class="row">
        <div class="well col-md-5 center login-box">
            <div class="alert alert-info">
                Please login with your Username and Password.
            </div>
            <?php $form=$this->beginWidget('CActiveForm', array(
																    'id'=>'login-form',
																    'enableClientValidation'=>true,
            														'htmlOptions'=>array(
						            														'class'=>'form-horizontal',
            														),
																    'clientOptions'=>array(
														        							'validateOnSubmit'=>true,
																    ),
																)
										); ?>
                <fieldset>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <?php echo $form->textField($model,'email',array('class'=>'form-control','placeholder'=>'Username')); ?>
                    </div>
                    <?php echo $form->error($model,'email'); ?>
                    <div class="clearfix"></div><br>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <?php echo $form->passwordField($model,'password',array('class'=>'form-control','placeholder'=>'Password')); ?>
                    </div>
                    <?php echo $form->error($model,'password'); ?>
                    <div class="clearfix"></div>

                    <div class="input-prepend">
                        <?php echo $form->checkBox($model,'rememberMe'); ?>
				        <?php echo $form->label($model,'rememberMe'); ?>
                    </div>
			        <?php echo $form->error($model,'rememberMe'); ?>
                    <div class="clearfix"></div>

                    <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </p>
                </fieldset>
           <?php $this->endWidget(); ?>
        </div>
        <!--/span-->
    </div><!--/row-->
</div><!--/fluid-row-->

</div><!--/.fluid-container-->