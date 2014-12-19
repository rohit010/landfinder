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
	<div class="col-xs-12 col-xs-12 col-md-12">
		<div class="form">
		
		<?php $form=$this->beginWidget('CActiveForm', array(
																'id'=>'users-addUser-form',
															    'enableAjaxValidation'=>true,
															    'clientOptions'=>array(
															      						'validateOnSubmit'=>true,
															     ),
																'htmlOptions' => array(
																						'enctype' 	=>	'multipart/form-data',
																						'class'		=>	'form-horizontal'
																					),
															)
									); ?>
		
			<p class="note">Fields with <span class="required">*</span> are required.</p>
		<?php 
						if(Yii::app()->user->id=="1"){
							$usertypeArray = array('2'=>'Admin Users','3'=>'Vendors');
						} else {
							$usertypeArray = array('3'=>'Vendors');
						}
						?>
			<?php //echo $form->errorSummary($model); ?>
			<?php if($step==1){ ?>
			<div class="form-group">
				<div class="col-xs-12 col-sm-3 col-md-2">
					<?php echo $form->labelEx($model,'user_type',array('class'=>'control-label')); ?>
				</div>
			    <div class="col-xs-12 col-sm-6 col-md-6">
			    	<label class="radio-inline">
			    		<?php echo $form->radioButton($model,'user_type',array('value'=>'3','uncheckValue' => null)); ?>
			    		Owner
			    	</label>
			    	<label class="radio-inline">
			    		<?php echo $form->radioButton($model,'user_type',array('value'=>'4','uncheckValue' => null)); ?>
			    		Agent
			    	</label>
			    	<label class="radio-inline">
			    		<?php echo $form->radioButton($model,'user_type',array('value'=>'5','uncheckValue' => null)); ?>
			    		Builder
			    	</label>
			    </div>
			    <div class="col-xs-12 col-sm-3 col-md-4">
				    <?php echo $form->error($model,'user_type'); ?>
			    </div>
			</div>
			<div class="form-group">
				<div class="col-xs-12 col-sm-3 col-md-2">
					<?php echo $form->labelEx($model,'full_name',array('class'=>'control-label')); ?>
				</div>
			    <div class="col-xs-12 col-sm-6 col-md-6">
			    	<?php echo $form->textField($model,'full_name',array('class'=>'form-control input-sm input-sm','placeholder'=>'Enter First Name')); ?>
			    </div>
			    <div class="col-xs-12 col-sm-3 col-md-4">
				    <?php echo $form->error($model,'full_name'); ?>
			    </div>
			</div>
			<div class="form-group">
				<div class="col-xs-12 col-sm-3 col-md-2">
					<?php echo $form->labelEx($model,'email',array('class'=>'control-label')); ?>
				</div>
			    <div class="col-xs-12 col-sm-6 col-md-6">
			    	<?php echo $form->textField($model,'email',array('class'=>'form-control input-sm input-sm','placeholder'=>'Enter Your Email address')); ?>
			    </div>
			    <div class="col-xs-12 col-sm-3 col-md-4">
				    <?php echo $form->error($model,'email'); ?>
			    </div>
			</div>
			<div class="form-group">
				<div class="col-xs-12 col-sm-3 col-md-2">
					<?php echo $form->labelEx($model,'password',array('class'=>'control-label')); ?>
				</div>
			    <div class="col-xs-12 col-sm-6 col-md-6">
			    	<?php echo $form->textField($model,'password',array('class'=>'form-control input-sm input-sm','placeholder'=>'Enter Your password')); ?>
			    </div>
			    <div class="col-xs-12 col-sm-3 col-md-4">
				    <?php echo $form->error($model,'password'); ?>
			    </div>
			</div>
			<div class="form-group">
				<div class="col-xs-12 col-sm-3 col-md-2">
					<?php echo $form->labelEx($model,'city_id',array('class'=>'control-label')); ?>
				</div>
			    <div class="col-xs-12 col-sm-6 col-md-6">
			    	<?php echo $form->dropDownList($model, 'city_id', $cityList, array('empty'=>'- - Select City - -','class'=>'form-control input-sm input-sm')); ?>      
			    </div>
			    <div class="col-xs-12 col-sm-3 col-md-4">
				    <?php echo $form->error($model,'city_id'); ?>
			    </div>
			</div>
			<div class="form-group">
				<div class="col-xs-12 col-sm-3 col-md-2">
					<?php echo $form->labelEx($model,'mobile_no',array('class'=>'control-label')); ?>
				</div>
			    <div class="col-xs-12 col-sm-6 col-md-6">
			    	<div class="row">
				    	<div class="col-xs-4">
					    	<?php echo $form->dropDownList($model, 'country_code', array('+91'=>'+91 India'),array('class'=>'form-control input-sm input-sm')); ?>      
				    	</div>
				    	<div class="col-xs-8">
				    		<?php echo $form->textField($model,'mobile_no',array('class'=>'form-control input-sm input-sm','placeholder'=>'Enter Your Mobile Number')); ?>
				    	</div>
			    	</div>
			    </div>
			    <div class="col-xs-12 col-sm-3 col-md-4">
				    <?php echo $form->error($model,'mobile_no'); ?>
			    </div>
			</div>
			
			<div class="form-group">
				<div class="col-xs-12 col-sm-3 col-md-2">
					<?php echo $form->labelEx($model,'phone_no',array('class'=>'control-label')); ?>
				</div>
			    <div class="col-xs-12 col-sm-6 col-md-6">
			    	<div class="row">
				    	<div class="col-xs-3">
					    	<?php echo $form->dropDownList($model, 'country_code', array('+91'=>'+91 India'),array('class'=>'form-control input-sm input-sm')); ?>      
				    	</div>
				    	<div class="col-xs-3">
					    	<?php echo $form->textField($model,'area_code',array('class'=>'form-control input-sm input-sm','placeholder'=>'Enter Area Code')); ?>      
				    	</div>
				    	<div class="col-xs-6">
				    		<?php echo $form->textField($model,'phone_no',array('class'=>'form-control input-sm input-sm','placeholder'=>'Enter Your Phone Number')); ?>
				    	</div>
			    	</div>
			    </div>
			    <div class="col-xs-12 col-sm-3 col-md-4">
				    <?php echo $form->error($model,'phone_no'); ?>
			    </div>
			</div>
			
			<div class="form-group">
				<div class="col-xs-12 col-sm-3 col-md-2">
					<?php echo $form->labelEx($model,'website_url',array('class'=>'control-label')); ?>
				</div>
			    <div class="col-xs-12 col-sm-6 col-md-6">
		    		<?php echo $form->textField($model,'website_url',array('class'=>'form-control input-sm input-sm','placeholder'=>'Enter Your Website')); ?>
			    </div>
			    <div class="col-xs-12 col-sm-3 col-md-4">
				    <?php echo $form->error($model,'website_url'); ?>
			    </div>
			</div>
			
			<div class="form-group">
				<div class="col-xs-12 col-sm-3 col-md-2">
					<?php echo $form->labelEx($model,'address',array('class'=>'control-label')); ?>
				</div>
			    <div class="col-xs-12 col-sm-6 col-md-6">
		    		<?php echo $form->textArea($model,'address',array('class'=>'form-control input-sm input-sm','placeholder'=>'Enter your address')); ?>
			    </div>
			    <div class="col-xs-12 col-sm-3 col-md-4">
				    <?php echo $form->error($model,'address'); ?>
			    </div>
			</div>
			
			<div class="form-group">
				<div class="col-xs-12 col-sm-3 col-md-2">
					<?php echo $form->labelEx($model,'about_user',array('class'=>'control-label')); ?>
				</div>
			    <div class="col-xs-12 col-sm-6 col-md-6">
		    		<?php echo $form->textArea($model,'about_user',array('class'=>'form-control input-sm input-sm','placeholder'=>'Enter about your Company')); ?>
			    </div>
			    <div class="col-xs-12 col-sm-3 col-md-4">
				    <?php echo $form->error($model,'about_user'); ?>
			    </div>
			</div>
			<?php } ?>
			<?php if($step==2){ ?>
			<div class="form-group">
				<div class="col-xs-12 col-sm-3 col-md-2">
					<a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
						Upload Image
					</a>
					<?php echo $form->hiddenField($model, 'company_logo'); ?>
				</div>
			    <div class="col-xs-12 col-sm-6 col-md-6">
			    	<img src ="<?php echo $model->company_logo; ?>" id="previewImgage">
			    	<div id="loading"></div>
			    </div>
			    <div class="col-xs-12 col-sm-3 col-md-4">
			    </div>
			</div>
			<div class="form-group">
				<div class="col-xs-12 col-sm-3 col-md-2">
					Services
				</div>
			    <div class="col-xs-12 col-sm-6 col-md-12">
		    	<?php foreach ($subcategoryList as $key=>$value){ ?>
		    		<div class="col-xs-12 col-sm-4 col-md-4">
						<div class="checkbox">
		                    <label>
		                        <input name="property_services[]" value="<?= $value['subcategory_id'] ?>" type="checkbox" <?= ((in_array($value['subcategory_id'],$ExistCatsIds))?"checked='checked'":""); ?>>
		                        <?= $value['subcategory_name'] ?>
		                    </label>
		                </div>
	                </div>
					<?php } ?>
			    </div>
			</div>
			<div class="form-group">
				<div class="col-xs-12 col-sm-3 col-md-2">
					Priority
					<?php echo $form->dropDownList($model,'priority', array('0'=>'Normal','1','2','3','4','5','6','7','8','9','10'), array('class'=>'form-control')); ?>
				</div>
			</div>
			<?php } ?>
			
			<div class="form-group">
				<div class="col-xs-8 col-xs-offset-4 col-sm-8 col-sm-offset-4 col-md-8 col-md-offset-4">
					<?php echo CHtml::submitButton('Submit',array('class'=>'btn btn-inverse btn-default btn-sm')); ?>
				</div>
			</div>
		
		<?php $this->endWidget(); ?>
		</div><!-- form -->
	</div>
	<div class="modal fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" >

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Settings</h3>
                </div>
                <div class="modal-body">
                    <?php
					    $form=$this->beginWidget('CActiveForm', array(
					        'id'=>'img-upload',
					        'enableAjaxValidation' => FALSE,
					        'htmlOptions' => array('enctype' => 'multipart/form-data'),
					        ));
					?>
					<input type="file" name="profile-logo">
					    <?php echo CHtml::htmlButton('Upload',array(
					                'onclick'=>'javascript: send();', // on submit call JS send() function
					                'id'=> 'post-submit-btn', // button id
					                'class'=>'post_submit',
					            ));
					    ?>
					<?php $this->endWidget(); ?>
					<img alt="" src="" id="tmpimg">
					<input type="hidden" size="4" id="x" name="x">
					<input type="hidden" size="4" id="y" name="y">
					<input type="hidden" size="4" id="x2" name="x2">
					<input type="hidden" size="4" id="y2" name="y2">
					<input type="hidden" size="4" id="w" name="w">
					<input type="hidden" size="4" id="h" name="h">
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                    <a href="#" class="btn btn-primary save">Save changes</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
//this script executes when click on upload images link
var filename = "";
var jcrop_api;
function uploadImage() {
    $("#forum_image").click();
    return false;
}
//this script for collecting the form data and pass to the controller action and doing the on success validations
function send(){
    var formData = new FormData($("#img-upload")[0]);
    $('#loading').show();
    $('#loading').html('<div class="progress progress-striped progress-success active"><div class="progress-bar" style="width: 100%;"></div></div>');
    $.ajax({
        url: '/Users/default/AJAXuploadTmpImg',
        type: 'POST',
        data: formData,
        dataType:"json",
        // async: false,
        beforeSend: function() {
            // do some loading options
        },
        success: function (data) {
        	$('#loading').hide();
        	filename = data.imgurl;
            var imgurl = "/"+data.imgurl; 
            $('#tmpimg').attr("src",imgurl);
            jcrop_api = $('#tmpimg');
            $('#tmpimg').Jcrop({
        		onChange: showCoords,
        		onSelect: showCoords
        	});
            // on success do some validation or refresh the content div to display the uploaded images 
        },
 
        complete: function() {
            // success alerts
        },
 
        error: function (data) {
            alert("There may a error on uploading. Try again later");
        },
        cache: false,
        contentType: false,
        processData: false
    });
 
    return false;
}
function showCoords(c)
{
	$('#x').val(c.x);
	$('#y').val(c.y);
	$('#x2').val(c.x2);
	$('#y2').val(c.y2);
	$('#w').val(c.w);
	$('#h').val(c.h);
};
$(document).ready(function(){
	$('#Users_user_type').change(function(){
		if($(this).val()==3){
			$('.logoinfo').slideDown();
		} else {
			$('.logoinfo').slideUp();
		}
	});
	
	$('.save').click(function(){
		var x = $('#x').val(),
		y = $('#y').val(),
		x2 = $('#x2').val(),
		y2 = $('#y2').val(),
		w =  $('#w').val(),
		h = $('#h').val();
		$('#loading').show();
	    $('#loading').html('<div class="progress progress-striped progress-success active"><div class="progress-bar" style="width: 100%;"></div></div>');
		$.ajax({
			 url: '/Users/default/AJAXuploadCropedImg',
		        type: 'POST',
		        data: {'x':x,'y':y,'x2':x2,'y2':y2,'w':w,'h':h,'filepath':filename},
		        dataType:"json",
		        // async: false,
		        beforeSend: function() {
		            // do some loading options
		        },
		        success: function (data) {
		        	$('#loading').hide();
		    		$('.jcrop-holder').hide();
		    		$('#tmpimg').show();
		    		filename = "/"+filename+"?updated";
		    		$('#previewImgage').attr("src",filename);
		    		$('#Users_company_logo').val(filename);
		    		$('#myModal').modal('hide');
		        }
		 });
	});
});
	
</script>
<?php Yii::app()->getClientScript()->registerCssFile($this->assetsBase.'/jcrop/css/jquery.Jcrop.css'); ?>
<?php Yii::app()->getClientScript()->registerScriptFile($this->assetsBase.'/jcrop/js/jquery.Jcrop.js',CClientScript::POS_END); ?>