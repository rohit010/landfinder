<?php
/* @var $this ListingController */
/* @var $model Listing */
/* @var $form CActiveForm */
//CVarDumper::dump($model,10,true); 
?>

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
			<div class="box box-inner">
				<div class="box-header well">
					<h2><i class="glyphicon glyphicon-info-sign"></i> Select Vendor Option for Admin</h2>
					<div class="box-icon">
						<a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
						<a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
						<a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
					</div>
				</div>
				<div class="box-content">
					<div class="form-group">
						<div class="col-xs-12 col-sm-3 col-md-2">
							<?php echo $form->labelEx($model,'property_for',array('class'=>'control-label')); ?>
						</div>
					    <div class="col-xs-12 col-sm-6 col-md-6">
					    	<label class="radio-inline">
					    		<?php $radiopropertyvaues = array('value'=>'1','class'=>'property_for','uncheckValue' => null); 
					    		(isset($model->property_for) && $model->property_for==1) && ($radiopropertyvaues = array_merge($radiopropertyvaues,array('checked'=>'checked'))); 
					    		echo $form->radioButton($model,'property_for',$radiopropertyvaues); ?>
					    		Sale
					    	</label>
					    	<label class="radio-inline">
					    		<?php $radiopropertyvaues = array('value'=>'2','class'=>'property_for','uncheckValue' => null); 
					    		(isset($model->property_for) && $model->property_for==2) && ($radiopropertyvaues = array_merge($radiopropertyvaues,array('checked'=>'checked'))); 
					    		echo $form->radioButton($model,'property_for',$radiopropertyvaues); ?>
					    		Rent
					    	</label>
					    </div>
					    <div class="col-xs-12 col-sm-3 col-md-4">
						    <?php echo $form->error($model,'property_for'); ?>
					    </div>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-3 col-md-2">
							<?php echo $form->labelEx($model,'property_condition',array('class'=>'control-label')); ?>
						</div>
					    <div class="col-xs-12 col-sm-6 col-md-6">
					    	<div class="property_condition_sale" <?php echo ((($model->property_for==1) || ($model->property_for==""))?"style='display:block;'":"style='display:none;'"); ?>>
						    	<label class="radio-inline">
						    		<?php $radiopropertyvaues = array('value'=>'1','uncheckValue' => null); 
					    			(isset($model->property_condition) && $model->property_condition==1) && ($radiopropertyvaues = array_merge($radiopropertyvaues,array('checked'=>'checked'))); 
						    		echo $form->radioButton($model,'property_condition',$radiopropertyvaues); ?>
						    		Sale
						    	</label>
						    	<label class="radio-inline">
						    		<?php $radiopropertyvaues = array('value'=>'2','uncheckValue' => null); 
					    			(isset($model->property_condition) && $model->property_condition==2) && ($radiopropertyvaues = array_merge($radiopropertyvaues,array('checked'=>'checked'))); 
						    		echo $form->radioButton($model,'property_condition',$radiopropertyvaues); ?>
						    		Resale
						    	</label>
					    	</div>
					    	<div class="property_condition_rent" <?php echo (($model->property_for==2)?"style='display:block;'":"style='display:none;'"); ?>>
						    	<label class="radio-inline">
						    		<?php $radiopropertyvaues = array('value'=>'3','uncheckValue' => null); 
					    			(isset($model->property_condition) && $model->property_condition==3) && ($radiopropertyvaues = array_merge($radiopropertyvaues,array('checked'=>'checked'))); 
						    		echo $form->radioButton($model,'property_condition',$radiopropertyvaues); ?>
						    		Rent Out 
						    	</label>
						    	<label class="radio-inline">
						    		<?php $radiopropertyvaues = array('value'=>'4','uncheckValue' => null); 
					    			(isset($model->property_condition) && $model->property_condition==4) && ($radiopropertyvaues = array_merge($radiopropertyvaues,array('checked'=>'checked'))); 
						    		echo $form->radioButton($model,'property_condition',$radiopropertyvaues); ?>
						    		Lease
						    	</label>
					    	</div>
					    </div>
					    <div class="col-xs-12 col-sm-3 col-md-4">
						    <?php echo $form->error($model,'property_condition'); ?>
					    </div>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-3 col-md-2">
							<?php echo $form->labelEx($model,'property_type',array('class'=>'control-label')); ?>
						</div>
					    <div class="col-xs-12 col-sm-6 col-md-3">
				    		<?php echo $form->dropDownList($model, 'property_type', $propertyType,array('class'=>'form-control input-sm input-sm')); ?>
					    </div>
					    
					    <div class="col-xs-12 col-sm-3 col-md-2">
							<?php echo $form->labelEx($model,'property_sub_type',array('class'=>'control-label')); ?>
						</div>
					    <div class="col-xs-12 col-sm-6 col-md-3">
				    		<?php echo $form->dropDownList($model, 'property_sub_type', $property_sub_type,array('class'=>'form-control input-sm input-sm')); ?>
					    </div>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-3 col-md-4 col-md-offset-2">
						    <?php echo $form->error($model,'property_type'); ?>
					    </div>
					     <div class="col-xs-12 col-sm-3 col-md-4 col-md-offset-2">
						    <?php echo $form->error($model,'property_sub_type'); ?>
					    </div>
					</div>
				</div>
			</div>
			
			<div class="box box-inner">
				<div class="box-header well">
					<h2><i class="glyphicon glyphicon-info-sign"></i> Location Info</h2>
					<div class="box-icon">
						<a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
						<a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
						<a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
					</div>
				</div>
				<div class="box-content">
					<div class="form-group">
						<div class="col-xs-12 col-sm-3 col-md-2">
							<?php echo $form->labelEx($model,'state',array('class'=>'control-label')); ?>
						</div>
					    <div class="col-xs-12 col-sm-6 col-md-3">
				    		<?php echo $form->dropDownList($model, 'state', $stateList,array('class'=>'form-control input-sm input-sm')); ?>
					    </div>
					    <div class="col-xs-12 col-sm-3 col-md-4">
						    <?php echo $form->error($model,'state'); ?>
					    </div>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-3 col-md-2">
							<?php echo $form->labelEx($model,'city',array('class'=>'control-label')); ?>
						</div>
					    <div class="col-xs-12 col-sm-6 col-md-3">
				    		<?php echo $form->dropDownList($model, 'city', $cityList,array('class'=>'form-control input-sm input-sm')); ?>
					    </div>
					    <div class="col-xs-12 col-sm-3 col-md-4">
						    <?php echo $form->error($model,'city'); ?>
					    </div>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-3 col-md-2">
							<?php echo $form->labelEx($model,'location',array('class'=>'control-label')); ?>
						</div>
					    <div class="col-xs-12 col-sm-6 col-md-3">
				    		<?php echo $form->textField($model,'location',array('class'=>'form-control input-sm input-sm','placeholder'=>'Enter land Location')); ?>
					    </div>
					    <div class="col-xs-12 col-sm-3 col-md-4">
						    <?php echo $form->error($model,'location'); ?>
					    </div>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-3 col-md-2">
							<?php echo $form->labelEx($model,'name',array('class'=>'control-label')); ?>
						</div>
					    <div class="col-xs-12 col-sm-6 col-md-3">
				    		<?php echo $form->textField($model,'name',array('class'=>'form-control input-sm input-sm','placeholder'=>'Enter the Project Name')); ?>
					    </div>
					    <div class="col-xs-12 col-sm-3 col-md-4">
						    <?php echo $form->error($model,'name'); ?>
					    </div>
					</div>
				</div>
			</div>
			
			<div class="box box-inner">
				<div class="box-header well">
					<h2><i class="glyphicon glyphicon-info-sign"></i> Area of the Property</h2>
					<div class="box-icon">
						<a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
						<a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
						<a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
					</div>
				</div>
				<div class="box-content">
					<div class="form-group">
						<div class="col-xs-12 col-sm-3 col-md-2">
							<?php echo $form->labelEx($model,'area',array('class'=>'control-label')); ?>
						</div>
					    <div class="col-xs-12 col-sm-6 col-md-3">
				    		<?php echo $form->numberField($model,'area',array('class'=>'form-control input-sm input-sm','placeholder'=>'Type the Area','min'=>'0')); ?>
					    </div>
					    <div class="col-xs-12 col-sm-6 col-md-2">
					    	<?php echo $form->dropDownList($model, 'area_unit', $areaUnit,array('class'=>'form-control input-sm input-sm')); ?>
				    	</div>
					    <div class="col-xs-12 col-sm-3 col-md-4">
						    <?php echo $form->error($model,'area'); ?>
					    </div>
					</div>
				</div>
			</div>
			<div class="box box-inner">
				<div class="box-header well">
					<h2><i class="glyphicon glyphicon-info-sign"></i> Price of property</h2>
					<div class="box-icon">
						<a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
						<a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
						<a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
					</div>
				</div>
				<div class="box-content">
					<div class="form-group">
						<div class="col-xs-12 col-sm-3 col-md-2">
							<?php echo $form->labelEx($model,'sale_price_cores',array('class'=>'control-label')); ?>
						</div>
					    <div class="col-xs-4 col-sm-2 col-md-1">
				    		<?php echo $form->numberField($model,'sale_price_cores',array('class'=>'form-control input-sm input-sm','placeholder'=>'Core','min'=>'0')); ?>
					    </div>
					    <div class="col-xs-4 col-sm-2 col-md-1">
					    	<?php echo $form->numberField($model,'sale_price_lacks',array('class'=>'form-control input-sm input-sm','placeholder'=>'Lac','min'=>'0')); ?>
				    	</div>
				    	<div class="col-xs-4 col-sm-2 col-md-1">
					    	<?php echo $form->numberField($model,'sale_price_thousands',array('class'=>'form-control input-sm input-sm','placeholder'=>'Thousand','min'=>'0')); ?>
				    	</div>
					    <div class="col-xs-12 col-sm-3 col-md-4">
						    <?php echo $form->error($model,'sale_price_cores'); ?>
					    </div>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-3 col-md-2">
							<?php echo $form->labelEx($model,'sale_price_rate',array('class'=>'control-label')); ?>
						</div>
					   <div class="col-xs-12 col-sm-6 col-md-3">
				    		<?php echo $form->numberField($model,'sale_price_rate',array('class'=>'form-control input-sm input-sm','placeholder'=>'Price per Unit','min'=>'0')); ?>
					    </div>
					    <div class="col-xs-12 col-sm-3 col-md-4">
						    <?php echo $form->error($model,'sale_price_rate'); ?>
					    </div>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-3 col-md-2">
							<?php echo $form->labelEx($model,'property_rate_show_as',array('class'=>'control-label')); ?>
						</div>
					   <div class="col-xs-12 col-sm-6 col-md-4">
				    		<label class="radio-inline">
				    			<?php $radiopropertyvaues = array('value'=>'1','uncheckValue' => null); 
					    		(isset($model->property_rate_show_as) && $model->property_rate_show_as==1) && ($radiopropertyvaues = array_merge($radiopropertyvaues,array('checked'=>'checked')));
					    		echo $form->radioButton($model,'property_rate_show_as',$radiopropertyvaues); ?>
					    		<span class="prop_rate_show_1"><?php echo ((($model->sale_price_cores!="")?$model->sale_price_cores:"00").".".(($model->sale_price_lacks!="")?$model->sale_price_lacks:"00")); ?></span> Core(s)
					    	</label>
					    	<label class="radio-inline">
					    		<?php $radiopropertyvaues = array('value'=>'2','uncheckValue' => null); 
					    		(isset($model->property_rate_show_as) && $model->property_rate_show_as==2) && ($radiopropertyvaues = array_merge($radiopropertyvaues,array('checked'=>'checked')));
					    		echo $form->radioButton($model,'property_rate_show_as',$radiopropertyvaues); ?>
					    		<span class="prop_rate_show_1"><?php echo ((($model->sale_price_cores!="")?$model->sale_price_cores:"00").".".(($model->sale_price_lacks!="")?$model->sale_price_lacks:"00")); ?></span> Core(s) Negotiable
					    	</label>
					    	<label class="radio-inline">
					    		<?php $radiopropertyvaues = array('value'=>'3','uncheckValue' => null); 
					    		(isset($model->property_rate_show_as) && $model->property_rate_show_as==3) && ($radiopropertyvaues = array_merge($radiopropertyvaues,array('checked'=>'checked')));
					    		echo $form->radioButton($model,'property_rate_show_as',$radiopropertyvaues); ?>
					    		Call for Price
					    	</label>
					    </div>
					    <div class="col-xs-12 col-sm-3 col-md-4">
						    <?php echo $form->error($model,'property_rate_show_as'); ?>
					    </div>
					</div>
				</div>
			</div>
			
			<div class="box box-inner">
				<div class="box-header well">
					<h2><i class="glyphicon glyphicon-info-sign"></i> Transaction Type</h2>
					<div class="box-icon">
						<a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
						<a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
						<a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
					</div>
				</div>
				<div class="box-content">
					<div class="form-group">
						<div class="col-xs-12 col-sm-3 col-md-2">
							<?php echo $form->labelEx($model,'transaction_type',array('class'=>'control-label')); ?>
						</div>
					   <div class="col-xs-12 col-sm-6 col-md-3">
				    		<label class="radio-inline">
				    			<?php $radiopropertyvaues = array('value'=>'1','class'=>'transaction_type','uncheckValue' => null); 
					    		(isset($model->transaction_type) && $model->transaction_type==1) && ($radiopropertyvaues = array_merge($radiopropertyvaues,array('checked'=>'checked')));
					    		echo $form->radioButton($model,'transaction_type',$radiopropertyvaues); ?>
					    		New Property
					    	</label>
					    	<label class="radio-inline">
					    		<?php $radiopropertyvaues = array('value'=>'2','class'=>'transaction_type','uncheckValue' => null); 
					    		(isset($model->transaction_type) && $model->transaction_type==2) && ($radiopropertyvaues = array_merge($radiopropertyvaues,array('checked'=>'checked')));
					    		echo $form->radioButton($model,'transaction_type',$radiopropertyvaues); ?>
					    		Resale
					    	</label>
					    </div>
					    <div class="col-xs-12 col-sm-3 col-md-4">
						    <?php echo $form->error($model,'transaction_type'); ?>
					    </div>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-3 col-md-2">
							<?php echo $form->labelEx($model,'possession_status',array('class'=>'control-label')); ?>
						</div>
					   <div class="col-xs-12 col-sm-6 col-md-3">
				    		<label class="radio-inline">
				    			<?php $radiopropertyvaues = array('value'=>'1','uncheckValue' => null); 
					    		(isset($model->possession_status) && $model->possession_status==1) && ($radiopropertyvaues = array_merge($radiopropertyvaues,array('checked'=>'checked')));
					    		echo $form->radioButton($model,'possession_status',$radiopropertyvaues); ?>
					    		Under Constraction
					    	</label>
					    	<label class="radio-inline">
					    		<?php $radiopropertyvaues = array('value'=>'2','uncheckValue' => null); 
					    		(isset($model->possession_status) && $model->possession_status==2) && ($radiopropertyvaues = array_merge($radiopropertyvaues,array('checked'=>'checked')));
					    		echo $form->radioButton($model,'possession_status',$radiopropertyvaues); ?>
					    		Redy to Move
					    	</label>
					    </div>
					    <div class="col-xs-12 col-sm-3 col-md-4">
						    <?php echo $form->error($model,'possession_status'); ?>
					    </div>
					</div>
					<div class="form-group underconstrction" <?php echo (($model->possession_status==1)?'style="display: block;"':'style="display: none;"') ?> >
						<div class="col-xs-12 col-sm-3 col-md-2">
							<label class="control-label">Available From Month</label>
						</div>
					   <div class="col-xs-12 col-sm-6 col-md-3">
				    		<label class="radio-inline">
				    			<?php echo $form->dropDownList($model, 'available_from_month', $monthsList,array('class'=>'form-control input-sm input-sm')); ?>
					    	</label>
					    	<label class="radio-inline">
					    		<?php echo $form->dropDownList($model, 'available_from_year', $yearList,array('class'=>'form-control input-sm input-sm')); ?>
					    	</label>
					    </div>
					    <div class="col-xs-12 col-sm-3 col-md-4">
						    <?php echo $form->error($model,'possession_status'); ?>
					    </div>
					</div>
					<div class="form-group readytomove"  <?php echo (($model->possession_status==2)?'style="display: block;"':'style="display: none;"') ?>>
						<div class="col-xs-12 col-sm-3 col-md-2">
							<?php echo $form->labelEx($model,'age_of_construction',array('class'=>'control-label')); ?>
						</div>
					   <div class="col-xs-12 col-sm-6 col-md-3">
				    		<label class="radio-inline">
				    			<?php echo $form->dropDownList($model, 'age_of_construction', $ageOfConstruction,array('class'=>'form-control input-sm input-sm')); ?>
					    	</label>
					    </div>
					    <div class="col-xs-12 col-sm-3 col-md-4">
						    <?php echo $form->error($model,'age_of_construction'); ?>
					    </div>
					</div>
				</div>
			</div>
			<div class="box box-inner">
				<div class="box-header well">
					<h2><i class="glyphicon glyphicon-info-sign"></i> Description </h2>
					<div class="box-icon">
						<a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
						<a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
						<a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
					</div>
				</div>
				<div class="box-content">
					<div class="form-group">
						<div class="col-xs-12 col-sm-3 col-md-2">
							<?php echo $form->labelEx($model,'description',array('class'=>'control-label')); ?>
						</div>
					   <div class="col-xs-12 col-sm-6 col-md-3">
				    		<label class="radio-inline">
							    <?php echo $form->textArea($model, 'description', array('rows' => 10, 'cols' => 50, 'placeholder'=>'Enter Some thing about your property','class'=>'form-control input-sm input-sm')); ?>
					    	</label>
					    </div>
					    <div class="col-xs-12 col-sm-6 col-md-4">
					    	<div class="descriptionSample">
					    		<ol>
					    			<li>
					    				3 BHK comfortable flat with 2 attached bathrooms located in Hebbal, Bangalore. Well connected to the rest of Bangalore. 2 minutes walking distance from proposing metro station. Schools. Mall and markets are located nearby.
All major electricity and water supply connections are already installed.
					    			</li>
					    			<li>
					    				3 BHK apartment available in Kanakapura Road, Bangalore. Good connectivity with the rest of Bangalore. Has convenient facilities such as markets, schools, temples and mosques nearby. Apartment has power back-up, RO water system and intercom facilities. There is ample parking space for residents and visitors.
					    			</li>
					    			<li>
					    				Elegant and luxurious 4 BHK villa in Bangalore available for rent. Excellent location of Airport Road. The villa is fully furnished and includes 3 bathrooms, a private garden and a servant's quarter. Very near to markets, offices, exclusive schools and hospitals.
Power back-up and RO water system is already installed. Intercom facilities is also available.
					    			</li>
					    			<li>
					    				2 BHK residential apartment available, with an area of 950 sq. ft., which is located in Electronic Cty, Bangalore. The property is vaastu compliant. 2 attached balconies with all the bedrooms. Comes with modern amenities such as Wi-Fi internet, piped gas facility, air conditioning etc. 5 mins walk from nearest market and 10 minutes from school. Very close to top MNC IT company offices like Infosys and Wipro.
					    			</li>
					    			<li>
					    				Residential plot of 1200 sq ft available for sale in Sarjapur Road, Bangalore. Just 10 minutes away from carmelaram railway station. Great connectivity to the Bangalore International Airport, which is just a 1.5 hours drive from the plot.
										Amenities include storm water drainage system, club house, trees and water reservoir, electricity and water supply and telephone/internet connectivity.
					    			</li>
					    		</ol>
					    	</div>
				    	</div>
					</div>
					<div class="form-group">
					    <div class="col-xs-12 col-sm-3 col-md-offset-2 col-md-4">
						    <?php echo $form->error($model,'description'); ?>
					    </div>
					</div>
				</div>
			</div>
			<div class="box box-inner">
				<div class="box-header well">
					<h2><i class="glyphicon glyphicon-info-sign"></i> (Add Images Max-5)</h2>
					<div class="box-icon">
						<a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
						<a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
						<a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
					</div>
				</div>
				<div class="box-content row">
					<div class="col-xs-12 col-sm-3 col-md-2">
						<a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
							Upload Image
						</a>
					<?php echo $form->hiddenField($model, 'property_image'); ?>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6">
				    	<img src ="<?php echo $model->property_image; ?>" id="previewImgage">
				    	<div id="loading"></div>
				    </div>
				     <div class="col-xs-12 col-sm-3 col-md-4">
				    </div>
				</div>
			</div>
			<div class="box box-inner">
				<div class="box-header well">
					<h2><i class="glyphicon glyphicon-info-sign"></i> Location Information</h2>
					<div class="box-icon">
						<a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
						<a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
						<a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
					</div>
				</div>
				<div class="box-content">
					<div class="form-group">
						<div class="col-xs-12 col-sm-3 col-md-2">
							<?php echo $form->labelEx($model,'property_address',array('class'=>'control-label')); ?>
						</div>
					   <div class="col-xs-12 col-sm-6 col-md-3">
				    		<label class="radio-inline">
							    <?php echo $form->textArea($model, 'property_address', array('maxlength' => 300, 'rows' => 6, 'cols' => 50, 'placeholder'=>'Enter the address of the property','class'=>'form-control input-sm input-sm')); ?>
					    	</label>
					    </div>
					    <div class="col-xs-12 col-sm-3 col-md-4">
						    <?php echo $form->error($model,'property_address'); ?>
					    </div>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-3 col-md-2">
							<?php echo $form->labelEx($model,'pincode',array('class'=>'control-label')); ?>
						</div>
					   <div class="col-xs-12 col-sm-6 col-md-3">
				    		<label class="radio-inline">
							    <?php echo $form->numberField($model, 'pincode', array('maxlength' => 6,'min'=>'0', 'placeholder'=>'EX :- 560001','class'=>'form-control input-sm input-sm')); ?>
					    	</label>
					    </div>
					    <div class="col-xs-12 col-sm-3 col-md-4">
						    <?php echo $form->error($model,'property_address'); ?>
					    </div>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-3 col-md-2">
							<label class="control-label">Google Map</label>
						</div>
					   	<div class="col-xs-12 col-sm-6 col-md-7">
							<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
							<div class="Google-Map">
								<?php if($model->latitude==""){
									echo $form->hiddenField($model, 'latitude',array("value"=>"12.9715987"));
								} else {
									echo $form->hiddenField($model, 'latitude');
								}
								if($model->longitude==""){
									echo $form->hiddenField($model, 'longitude',array("value"=>"77.59456269999998"));
								} else {
									echo $form->hiddenField($model, 'longitude');
								}
								?>
								<div id="mapCanvas"></div>
								<style>
										#gmap_canvas img{max-width:none!important;background:none!important}
								</style>
							</div>
							<div id="info">12.9715987, 77.59456269999998</div>
							<div id="address">24/1, Vittal Mallya Road, KG Halli, Shanthala Nagar, Ashok Nagar, Bengaluru, Karnataka 560001, India</div>
				   		</div>
					</div>
				</div>
			</div>
			<div class="box box-inner">
				<div class="box-header well">
					<h2><i class="glyphicon glyphicon-info-sign"></i> Property Features &amp; Ownership</h2>
					<div class="box-icon">
						<a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
						<a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
						<a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
					</div>
				</div>
				<div class="box-content">
					<div class="form-group">
						<div class="col-xs-12 col-sm-3 col-md-2">
							<label class="control-label">Additional Room</label>
						</div>
					   <div class="col-xs-12 col-sm-6 col-md-4">
				    		<label class="checkbox-inline">
							    <?php 
							    echo $form->checkbox($model, 'additional_room_puja', array(
																									    'value'=>1,
																									    'uncheckValue'=>"",
																									)
														);
								echo "Pooja Room";
							?>
					    	</label>
				    		<label class="checkbox-inline">
						    <?php 
		
								echo $form->checkbox($model, 'additional_room_study', array(
																									    'value'=>1,
																									    'uncheckValue'=>"",
																									)
														);
								echo "Study";
							?>
					    	</label>
				    		<label class="checkbox-inline">
						    <?php 
								
								echo $form->checkbox($model, 'additional_room_store', array(
																									    'value'=>1,
																									    'uncheckValue'=>"",
																									)
														);
								echo "Store";
							?>
					    	</label>
				    		<label class="checkbox-inline">
						    <?php 
								
								echo $form->checkbox($model, 'additional_room_servent', array(
																									    'value'=>1,
																									    'uncheckValue'=>"",
																									)
														);
								echo "Servent Room";
								?>
					    	</label>
					    </div>
					    <div class="col-xs-12 col-sm-3 col-md-4">
						    <?php echo $form->error($model,'additional_room_puja'); ?>
					    </div>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-3 col-md-2">
							<?php echo $form->labelEx($model,'property_facing',array('class'=>'control-label')); ?>
						</div>
					   <div class="col-xs-12 col-sm-6 col-md-3">
				    		<label class="radio-inline">
							    <?php 
								 $face_list = array(
								 						"East"			=>	"East",
								 						"West"			=>	"West",
								 						"North"			=>	"North",
								 						"South"			=>	"South",
								 						"North-East"	=>	"North-East",
								 						"South-East"	=>	"South-East",
								 						"Noth-West"		=>	"North-West",
								 						"South-West"	=>	"South-West",
								 					);	
								 			echo $form->dropDownList($model,'property_facing', $face_list, array('empty' => 'Select a Category','class'=>'form-control input-sm'));
								?>
					    	</label>
					    </div>
					    <div class="col-xs-12 col-sm-3 col-md-4">
						    <?php echo $form->error($model,'property_facing'); ?>
					    </div>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-3 col-md-2">
							<label class="control-label">Amenities</label>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-8">
						<?php 
						foreach ($ameniiesList as $key => $value) {
							?>
						   <div class="col-xs-12 col-sm-6 col-md-4">
					    		<label class="checkbox-inline">
					    			<input name="property_amenities[]"  value="<?= $value['id']; ?>" type="checkbox" <?= ((in_array($value['id'],$ExistAmenitiesIds))?"checked='checked'":""); ?>>
								    <?php 
									echo $value['amenities_name'];			?>
						    	</label>
						    </div>
						<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<div class="box box-inner">
				<div class="box-header well">
					<h2><i class="glyphicon glyphicon-info-sign"></i> Amenities &amp; Other Charges</h2>
					<div class="box-icon">
						<a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
						<a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
						<a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
					</div>
				</div>
				<div class="box-content">
					
					<div class="form-group">
						<div class="col-xs-12 col-sm-3 col-md-2">
							<?php echo $form->labelEx($model,'near_by_hospital',array('class'=>'control-label')); ?>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="col-xs-4 col-sm-2 col-md-8">
					    		<?php echo $form->textField($model,'near_by_hospital',array('class'=>'form-control input-sm input-sm','placeholder'=>'Near by Hospital')); ?>
						    </div>
						    <div class="col-xs-4 col-sm-2 col-md-4">
					    		<?php echo $form->textField($model,'near_by_hospital_distance',array('class'=>'form-control input-sm input-sm','placeholder'=>'In KMS')); ?>
						    </div>				
					    </div>
					    <div class="col-xs-12 col-sm-3 col-md-4">
						    <?php echo $form->error($model,'near_by_hospital'); ?>
					    </div>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-3 col-md-2">
							<?php echo $form->labelEx($model,'near_by_mall_market',array('class'=>'control-label')); ?>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="col-xs-4 col-sm-2 col-md-8">
					    		<?php echo $form->textField($model,'near_by_mall_market',array('class'=>'form-control input-sm input-sm','placeholder'=>'Near by Mall / Market')); ?>
						    </div>
						    <div class="col-xs-4 col-sm-2 col-md-4">
					    		<?php echo $form->textField($model,'near_by_mall_market_distance',array('class'=>'form-control input-sm input-sm','placeholder'=>'In KMS')); ?>
						    </div>				
					    </div>
					    <div class="col-xs-12 col-sm-3 col-md-4">
						    <?php echo $form->error($model,'near_by_mall_market'); ?>
					    </div>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-3 col-md-2">
							<?php echo $form->labelEx($model,'near_by_atm_bank',array('class'=>'control-label')); ?>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="col-xs-4 col-sm-2 col-md-8">
					    		<?php echo $form->textField($model,'near_by_atm_bank',array('class'=>'form-control input-sm input-sm','placeholder'=>'Near by ATM / Bank')); ?>
						    </div>
						    <div class="col-xs-4 col-sm-2 col-md-4">
					    		<?php echo $form->textField($model,'near_by_atm_bank_distance',array('class'=>'form-control input-sm input-sm','placeholder'=>'In KMS')); ?>
						    </div>				
					    </div>
					    <div class="col-xs-12 col-sm-3 col-md-4">
						    <?php echo $form->error($model,'near_by_atm_bank'); ?>
					    </div>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-3 col-md-2">
							<?php echo $form->labelEx($model,'near_by_airport',array('class'=>'control-label')); ?>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="col-xs-4 col-sm-2 col-md-8">
					    		<?php echo $form->textField($model,'near_by_airport',array('class'=>'form-control input-sm input-sm','placeholder'=>'Near by Airport')); ?>
						    </div>
						    <div class="col-xs-4 col-sm-2 col-md-4">
					    		<?php echo $form->textField($model,'near_by_airport_distance',array('class'=>'form-control input-sm input-sm','placeholder'=>'In KMS')); ?>
						    </div>				
					    </div>
					    <div class="col-xs-12 col-sm-3 col-md-4">
						    <?php echo $form->error($model,'near_by_airport'); ?>
					    </div>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-3 col-md-2">
							<?php echo $form->labelEx($model,'near_by_railway_station',array('class'=>'control-label')); ?>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="col-xs-4 col-sm-2 col-md-8">
					    		<?php echo $form->textField($model,'near_by_railway_station',array('class'=>'form-control input-sm input-sm','placeholder'=>'Near by Railway Station')); ?>
						    </div>
						    <div class="col-xs-4 col-sm-2 col-md-4">
					    		<?php echo $form->textField($model,'near_by_hospital_distance',array('class'=>'form-control input-sm input-sm','placeholder'=>'In KMS')); ?>
						    </div>				
					    </div>
					    <div class="col-xs-12 col-sm-3 col-md-4">
						    <?php echo $form->error($model,'near_by_railway_station'); ?>
					    </div>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-3 col-md-2">
							<?php echo $form->labelEx($model,'near_by_school',array('class'=>'control-label')); ?>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="col-xs-4 col-sm-2 col-md-8">
					    		<?php echo $form->textField($model,'near_by_school',array('class'=>'form-control input-sm input-sm','placeholder'=>'Near by School')); ?>
						    </div>
						    <div class="col-xs-4 col-sm-2 col-md-4">
					    		<?php echo $form->textField($model,'near_by_school_distance',array('class'=>'form-control input-sm input-sm','placeholder'=>'In KMS')); ?>
						    </div>				
					    </div>
					    <div class="col-xs-12 col-sm-3 col-md-4">
						    <?php echo $form->error($model,'near_by_school'); ?>
					    </div>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-3 col-md-2">
							<?php echo $form->labelEx($model,'near_by_metro_station',array('class'=>'control-label')); ?>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="col-xs-4 col-sm-2 col-md-8">
					    		<?php echo $form->textField($model,'near_by_metro_station',array('class'=>'form-control input-sm input-sm','placeholder'=>'Near by Metro Station')); ?>
						    </div>
						    <div class="col-xs-4 col-sm-2 col-md-4">
					    		<?php echo $form->textField($model,'near_by_metro_station_distance',array('class'=>'form-control input-sm input-sm','placeholder'=>'In KMS')); ?>
						    </div>				
					    </div>
					    <div class="col-xs-12 col-sm-3 col-md-4">
						    <?php echo $form->error($model,'near_by_metro_station'); ?>
					    </div>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-3 col-md-2">
							<?php echo $form->labelEx($model,'landmark',array('class'=>'control-label')); ?>
						</div>
					   <div class="col-xs-12 col-sm-6 col-md-3">
				    		<label class="radio-inline">
							    <?php echo $form->textArea($model, 'landmark', array('maxlength' => 300, 'rows' => 6, 'cols' => 50, 'placeholder'=>'Enter the address of the property','class'=>'form-control input-sm input-sm')); ?>
					    	</label>
					    </div>
					    <div class="col-xs-12 col-sm-3 col-md-4">
						    <?php echo $form->error($model,'landmark'); ?>
					    </div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-xs-8 col-xs-offset-4 col-sm-8 col-sm-offset-4 col-md-8 col-md-offset-4">
					<?php echo CHtml::submitButton('Submit',array('class'=>'btn btn-inverse btn-default btn-sm')); ?>
				</div>
			</div>

			<?php $this->endWidget(); ?>
		</div>
		<div class="modal fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" >

	        <div class="modal-dialog" style="max-width:90%;min-width:10%; width: auto; ">
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
</div>
<?php Yii::app()->getClientScript()->registerCssFile($this->assetsBase.'/jcrop/css/jquery.Jcrop.css'); ?>
<?php Yii::app()->getClientScript()->registerScriptFile($this->assetsBase.'/jcrop/js/jquery.Jcrop.js',CClientScript::POS_END); ?>
<style>
	.descriptionSample{
		float: left; 
		width: 100%; 
		height: 300px;
		border: 1px solid #cccccc; 
		overflow: auto;
	}
	.descriptionSample li{
		cursor: pointer!important;
		margin-bottom:10px;
		color: #5e5e5e;	
	}
	.Google-Map{
		overflow:hidden;
		height:500px;
	}
	.Google-Map #mapCanvas{
		height:100%;
		width:90%
	}
</style>
<script type="text/javascript">
	var latitude = "";
	var longitude = "";
	var zoom = 18;
	var geocoder = new google.maps.Geocoder();
	
	function geocodePosition(pos) {
	  geocoder.geocode({
	    latLng: pos
	  }, function(responses) {
	    if (responses && responses.length > 0) {
	    	document.getElementById('Properties_latitude').value = pos.lat();
	    	document.getElementById('Properties_longitude').value = pos.lng();
	      	updateMarkerAddress(responses[0].formatted_address);
	      	//document.getElementById('address_map').value = responses[0].formatted_address;
	      	
	    } else {
	      updateMarkerAddress('Cannot determine address at this location.');
	    }
	  });
	}
	function initialize() {
		if(((latitude!="") || (latitude!=0)) || ((longitude!="") || (longitude!=0))){
			var latLng = new google.maps.LatLng(latitude,longitude);
		  	var map = new google.maps.Map(document.getElementById('mapCanvas'), {
																				    zoom: zoom,
																				    center: latLng,
																				    mapTypeId: google.maps.MapTypeId.ROADMAP
																				});
			var marker = new google.maps.Marker({
													    position: latLng,
													    title: 'Point A',
													    map: map,
													    draggable: true
					  							});
		  
			// Update current position info.
			updateMarkerPosition(latLng);
			geocodePosition(latLng);
		  
		  	// Add dragging event listeners.
		  	google.maps.event.addListener(marker, 'dragstart', function() {
		    	updateMarkerAddress('Checking...');
		  	});
		  
		  	google.maps.event.addListener(marker, 'drag', function() {
		    	updateMarkerPosition(marker.getPosition());
		  	});
		  
		  	google.maps.event.addListener(marker, 'dragend', function() {
		    	geocodePosition(marker.getPosition());
		  	});
		} else {
			var address = document.getElementById('Properties_property_address').value;
			showAddress(address);
		}
	}
	function updateMarkerPosition(latLng) {
		console.log([latLng.lat(),latLng.lng()].join(', '));
	  document.getElementById('info').innerHTML = [latLng.lat(),latLng.lng()].join(', ');
	}
		
	function updateMarkerAddress(str) {
	  document.getElementById('address').innerHTML = str;
	}
			
	function showAddress(address) {
		geocoder.geocode( { 'address': address}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				latitude = results[0].geometry.location.lat();
			 	longitude = results[0].geometry.location.lng();
			 	zoom = 18;
			 	initialize();
			 	//geocodePosition(results[0].geometry.location);
			 	//updateMarkerPosition(results[0].geometry.location);
			 } else {
		 		alert("Geocode was not successful for the following reason: " + status);
		 	}
		});
	}
	function send(){
	    var formData = new FormData($("#img-upload")[0]);
	    $('#loading').show();
	    $('#loading').html('<div class="progress progress-striped progress-success active"><div class="progress-bar" style="width: 100%;"></div></div>');
	    $.ajax({
	        url: '/Users/default/AJAXuploadTmpImg?cat=property',
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
		
		latitude = $('#Properties_latitude').val(),
		longitude = $('#Properties_longitude').val();
		google.maps.event.addDomListener(window, 'load', initialize);
		$('#Properties_property_address, #Properties_pincode').change(function(){
				showAddress($(this).val());
		});
		$('.property_for').change(function(){
			var property_for = $(this).val();
			$('.property_condition_sale').hide();
			$('.property_condition_rent').hide();
			$('.property_condition_sale').find('input[type="radio"]').attr("checked",false);
			$('.property_condition_rent').find('input[type="radio"]').attr("checked",false);
			if(property_for==1){
				$('.property_condition_sale').show();
				$('.property_condition_rent').hide();
			} else if(property_for==2){
				$('.property_condition_sale').hide();
				$('.property_condition_rent').show();
			}
		});
		$('#Properties_property_type').change(function(){
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
					$('#Properties_property_sub_type').html(data);
				},
				erro:function(o){
				}
			});
		});
		$('.descriptionSample li').click(function(){
			var description = $(this).text().trim();
			$(this).select();
			$('#Properties_description').val(description);
		});
		$('#Properties_sale_price_cores, #Properties_sale_price_lacks, #Properties_sale_price_thousands').change(function(){
			var cores = $('#Properties_sale_price_cores').val(),
			lacks = $('#Properties_sale_price_lacks').val();
																		
			$('.prop_rate_show_1').html(((cores!="")?cores:0)+"."+((lacks!="")?lacks:0));
		});
		$('input[name="Properties[possession_status]"]').change(function(){
			if($(this).val()==1){
				$('.underconstrction').slideDown();
				$('.readytomove').slideUp();
			} else if($(this).val()==2){
				$('.underconstrction').slideUp();
				$('.readytomove').slideDown();		
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
				 url: '/Users/default/MoveImages',
			        type: 'POST',
			        data: {'cat':'property','filepath':filename},
			        dataType:"json",
			        success: function (data) {
				        	if(data.status==200){
				        					filename = data.filename;
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
											    		$('#Properties_property_image').val(filename);
											    		$('#myModal').modal('hide');
											        }
											 });
				        	} else {
				        	}
		        	 }
			 });
		});
	});
</script>