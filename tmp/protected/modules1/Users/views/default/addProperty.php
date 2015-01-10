<?php
/* @var $this ListingController */
/* @var $model Listing */
/* @var $form CActiveForm */
?>
<div class="row">
	<div class="col-xs-8 col-xs-offset-2">
		<div class="form">

			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'listing-addProperty-form',
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
				<?php echo $form->labelEx($model,'category_id'); ?>
				<?php $list = CHtml::listData($propertyType,'category_id', 'category_name');
			 			echo $form->dropDownList($model,'category_id', $list, array('empty' => '(Select a Category','class'=>'form-control input-sm')); ?>
				<?php echo $form->error($model,'category_id'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'property_subcategory_type'); ?>
				<?php 
					echo $form->radioButton($model, 'property_subcategory_type', array(
					    'value'=>1,
					    'uncheckValue'=>""
					));
					 echo " Land";
					echo $form->radioButton($model, 'property_subcategory_type', array(
					    'value'=>2,
					    'uncheckValue'=>null
					));
					echo " Building";
				?>
				<?php echo $form->error($model,'property_subcategory_type'); ?>
			</div>
			<?php 
// 			CVarDumper::dump($propertyType,10,true);
			?>
			<div class="form-group">
				<?php echo $form->labelEx($model,'subcategory_id'); ?>
				<?php $list = CHtml::listData($subcategory_parent,'subcategory_parent_id', 'subcategory_parent_name');
			 			echo $form->dropDownList($model,'subcategory_id', $list, array('empty' => 'Select a Category','class'=>'form-control input-sm')); ?>
				<?php echo $form->error($model,'subcategory_id'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'property_subcategory_type'); ?>
				<?php $list = CHtml::listData($getChildSubCategories,'subcategory_child_id', 'subcategory_child_name');
			 			echo $form->dropDownList($model,'property_subcategory_type', $list, array('empty' => 'Select a Child Category','class'=>'form-control input-sm')); ?>
				<?php echo $form->error($model,'property_subcategory_type'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'property_type'); ?>
				<?php $list = array('Buy'=>'Buy','Sale'=>'Sale','Rent'=>'Rent','Lease'=>'Lease');
			 			echo $form->dropDownList($model,'property_type', $list, array('empty' => 'Select a Child Category','class'=>'form-control input-sm')); ?>
				<?php echo $form->error($model,'property_type'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'state'); ?>
				<?php echo $form->dropDownList($model,'state', array('16'=>'Karnataka','17'=>'Kerala'), array('empty' => 'Select a State','class'=>'form-control input-sm')); ?>
				<?php echo $form->error($model,'state'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'city'); ?>
				<?php echo $form->dropDownList($model,'city', $cityList, array('empty' => ' Select a City','class'=>'form-control input-sm')); ?>
				<?php echo $form->error($model,'city'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'land_location'); ?>
				<?php echo $form->textField($model,'land_location',array('class'=>'form-control input-sm','placeholder'=>'Enter Land Location')); ?>
				<?php echo $form->error($model,'land_location'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'property_title'); ?>
				<?php echo $form->textField($model,'property_title',array('class'=>'form-control input-sm','placeholder'=>'Enter Property Title')); ?>
				<?php echo $form->error($model,'property_title'); ?>
			</div>
			
			<div class="form-group">
				<?php echo $form->labelEx($model,'property_approved'); ?>
				<?php echo $form->textField($model,'property_approved',array('class'=>'form-control input-sm','placeholder'=>'Enter Property Approved By')); ?>
				<?php echo $form->error($model,'property_approved'); ?>
			</div>
			
			<div class="form-group">
				<?php echo $form->labelEx($model,'name'); ?>
				<?php echo $form->textField($model,'name',array('class'=>'form-control input-sm','placeholder'=>'Enter Name of the Property')); ?>
				<?php echo $form->error($model,'name'); ?>
			</div>
			<div class="row">
				<div class="form-group col-xs-6">
					<?php echo $form->labelEx($model,'area'); ?>
					<?php echo $form->textField($model,'area',array('class'=>'form-control input-sm','placeholder'=>'Enter area of the Property')); ?>
					<?php echo $form->error($model,'area'); ?>
				</div>
				<div class="form-group col-xs-6">
					<?php echo $form->labelEx($model,'area_unit'); ?>
					<?php echo $form->textField($model,'area_unit',array('class'=>'form-control input-sm','placeholder'=>'Enter area unit of the Property')); ?>
					<?php echo $form->error($model,'area_unit'); ?>
				</div>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'bedroom'); ?>
				<?php echo $form->textField($model,'bedroom',array('class'=>'form-control input-sm','placeholder'=>'Enter No of Bedroom')); ?>
				<?php echo $form->error($model,'bedroom'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'bathroom'); ?>
				<?php echo $form->textField($model,'bathroom',array('class'=>'form-control input-sm','placeholder'=>'Enter No of Bathroom')); ?>
				<?php echo $form->error($model,'bathroom'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'total_floors'); ?>
				<?php echo $form->textField($model,'total_floors',array('class'=>'form-control input-sm','placeholder'=>'Enter Total no of floors')); ?>
				<?php echo $form->error($model,'total_floors'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'floor'); ?>
				<?php echo $form->textField($model,'floor',array('class'=>'form-control input-sm','placeholder'=>'Enter Propety Floor')); ?>
				<?php echo $form->error($model,'floor'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'furnished'); ?>
				<?php echo $form->textField($model,'furnished',array('class'=>'form-control input-sm','placeholder'=>'Enter Propety furnished')); ?>
				<?php echo $form->error($model,'furnished'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'age_construction'); ?>
				<?php echo $form->textField($model,'age_construction',array('class'=>'form-control input-sm','placeholder'=>'Enter Age of Construction')); ?>
				<?php echo $form->error($model,'age_construction'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'lease_period'); ?>
				<?php echo $form->textField($model,'lease_period',array('class'=>'form-control input-sm','placeholder'=>'Enter Lease Period')); ?>
				<?php echo $form->error($model,'lease_period'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'rent'); ?>
				<?php echo $form->textField($model,'rent',array('class'=>'form-control input-sm','placeholder'=>'Enter Monthly Rent')); ?>
				<?php echo $form->error($model,'rent'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'facing'); ?>
				<?php echo $form->textField($model,'facing',array('class'=>'form-control input-sm','placeholder'=>'Enter Property Facing')); ?>
				<?php echo $form->error($model,'facing'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'amenities'); ?>
				<?php echo $form->textField($model,'amenities',array('class'=>'form-control input-sm','placeholder'=>'Enter Property Amenities')); ?>
				<?php echo $form->error($model,'amenities'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'price'); ?>
				<?php echo $form->textField($model,'price',array('class'=>'form-control input-sm','placeholder'=>'Enter Property Price')); ?>
				<?php echo $form->error($model,'price'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'rate'); ?>
				<?php echo $form->textField($model,'rate',array('class'=>'form-control input-sm','placeholder'=>'Enter Property area Rate')); ?>
				<?php echo $form->error($model,'rate'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'image_locator'); ?>
				<?php echo $form->textField($model,'image_locator',array('class'=>'form-control input-sm','placeholder'=>'Enter Property Image Locator')); ?>
				<?php echo $form->error($model,'image_locator'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'description');
						Yii::import('ext.krichtexteditor.KRichTextEditor');
						$this->widget('KRichTextEditor', array(
								'model' => $model,
								'value' => $model->isNewRecord ? '' : $model->description,
								'attribute' => 'description',
								'options' => array(
										'theme_advanced_resizing' => 'true',
										'theme_advanced_statusbar_location' => 'bottom',
								),
						));
						echo $form->error($model,'description'); ?>
			</div>

			<div class="row buttons">
				<?php echo CHtml::submitButton('Submit'); ?>
			</div>

		<?php $this->endWidget(); ?>

		</div>
	</div>
</div><!-- form -->
<script type="text/javascript">
$(document).ready(function(){
	$('#Listing_category_id').change(function(){
		var CatVal = $(this).val();
		$.ajax({
			url:"/Users/default/AJAXUpdateParentSubCategories",
			data:{id:CatVal},
			type:'GET',
			dataType:'json',
			success:function(o){
				var data = "";
				$(o).each(function(i,k){
					data += "<option value='"+k.subcategory_parent_id+"'>"+k.subcategory_parent_name+"</option>";
				});
				$('#Listing_subcategory_id').html(data);
			},
			erro:function(o){
			}
		});
	});
	$('#Listing_state').change(function(){
		var CatVal = $(this).val();
		$.ajax({
			url:"/Users/default/AJAXUpdateCityList",
			data:{id:CatVal},
			type:'GET',
			dataType:'json',
			success:function(o){
				var data = "";
				$(o).each(function(i,k){
					data += "<option value='"+k.city_id+"'>"+k.city_name+"</option>";
				});
				$('#Listing_city').html(data);
			},
			erro:function(o){
			}
		});
	});
	
});
</script>