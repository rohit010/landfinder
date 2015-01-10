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
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6">
					<div class="form-group">
						<?php 
						if(Yii::app()->user->id=="1"){
							$usertypeArray = array('2'=>'Admin Users','3'=>'Vendors');
						} else {
							$usertypeArray = array('3'=>'Vendors');
						}
						echo $form->dropDownList($model,'user_type', $usertypeArray, array('class'=>'form-control input-sm input-sm')); ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6">
					<div class="form-group">
						<?php echo $form->labelEx($model,'first_name'); ?>
						<?php echo $form->textField($model,'first_name',array('class'=>'form-control input-sm input-sm','placeholder'=>'Enter First Name')); ?>
						<?php echo $form->error($model,'first_name'); ?>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6">
					<div class="form-group">
						<?php echo $form->labelEx($model,'last_name'); ?>
						<?php echo $form->textField($model,'last_name',array('class'=>'form-control input-sm','placeholder'=>'Enter Last Name')); ?>
						<?php echo $form->error($model,'last_name'); ?>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6">
					<div class="form-group">
						<?php echo $form->labelEx($model,'email'); ?>
						<?php echo $form->textField($model,'email',array('class'=>'form-control input-sm','placeholder'=>'Enter Email Id','autocomplete'=>"off")); ?>
						<?php echo $form->error($model,'email'); ?>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6">
					<div class="form-group">
						<?php echo $form->labelEx($model,'password'); ?>
						<?php echo $form->passwordField($model,'password',array('class'=>'form-control input-sm','placeholder'=>'Enter Password')); ?>
						<?php echo $form->error($model,'password'); ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6">
					<div class="form-group">
						<?php echo $form->labelEx($model,'phone_no'); ?>
						<?php echo $form->textField($model,'phone_no',array('class'=>'form-control input-sm','placeholder'=>'Enter Phone No')); ?>
						<?php echo $form->error($model,'phone_no'); ?>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6">
					<div class="form-group">
						<?php echo $form->labelEx($model,'mobile_no'); ?>
						<?php echo $form->textField($model,'mobile_no',array('class'=>'form-control input-sm','placeholder'=>'Enter Mobile No','maxlen'=>'10')); ?>
						<?php echo $form->error($model,'mobile_no'); ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<?php echo $form->labelEx($model,'website_url'); ?>
						<?php echo $form->textField($model,'website_url',array('class'=>'form-control input-sm','placeholder'=>'Enter website URL')); ?>
						<?php echo $form->error($model,'website_url'); ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<?php echo $form->labelEx($model,'address'); ?>
						<?php echo $form->textArea($model,'address',array('class'=>'form-control input-sm','placeholder'=>'Enter Address')); ?>
						<?php echo $form->error($model,'address'); ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<?php echo $form->labelEx($model,'about_user'); ?>
						<?php echo $form->textArea($model,'about_user',array('class'=>'form-control input-sm','placeholder'=>'Enter About Users')); ?>
						<?php echo $form->error($model,'about_user'); ?>
					</div>
				</div>
			</div>

			<div class="logoinfo" style="<?php echo (count($usertypeArray)==1)?"display:block":"display:none"; ?>">
				<div class="row" >
					<div class="col-xs-12">
						<a class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
							Upload Image
						</a>
						<img src ="<?php echo $model->user_logo; ?>" id="previewImgage">
						<?php echo $form->hiddenField($model, 'user_logo'); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-6">
						<div class="form-group">
							<div class="checkbox">
			                    <label>
			                        <?php echo $form->checkBox($model,'listing_flag'); ?>
			                        Listing Flag
			                    </label>
			                </div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6">
						<?php echo $form->dropDownList($model,'priority', array('0'=>'Normal','1','2','3','4','5'), array('class'=>'form-control')); ?>
					</div>
				</div>
			</div>
		
			
			<div class="form-group">
				<?php echo CHtml::submitButton('Submit',array('class'=>'btn btn-inverse btn-default btn-sm')); ?>
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
		    		$('.jcrop-holder').hide();
		    		$('#tmpimg').show();
		    		filename = "/"+filename+"?updated";
		    		$('#previewImgage').attr("src",filename);
		    		$('#Users_user_logo').val(filename);
		        }
		 });
	});
});
	
</script>
<?php Yii::app()->getClientScript()->registerCssFile($this->assetsBase.'/jcrop/css/jquery.Jcrop.css'); ?>
<?php Yii::app()->getClientScript()->registerScriptFile($this->assetsBase.'/jcrop/js/jquery.Jcrop.js',CClientScript::POS_END); ?>