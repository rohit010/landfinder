<div class="box col-md-12">
    <div class="box-inner">
	    <div class="box-header well" data-original-title="">
	        <h2><i class="glyphicon glyphicon-user"></i> Manage External Users</h2>
	
	        <div class="box-icon">
	            <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
	            <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
	            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
	        </div>
	    </div>
	    <div class="box-content">
	    	<form method="get" class="row" style="margin-bottom: 10px;">
	    		<div class="form-group">
	    			<div class="col-xs-12 col-sm-4 col-md-2">
			    		<input name="email_number_name" type="text" class="form-control" placeholder="Name / Email / Number" value="<?= (isset($_GET['email_number_name'])?$_GET['email_number_name']:""); ?>">
    				</div>
    				<div class="col-xs-12 col-sm-4 col-md-2">
			    		<?php 
			    		$this->widget('zii.widgets.jui.CJuiDatePicker',array(
																			    'name'	=>'created_from',
														        				'value'	=>	((isset($_GET['created_from'])?$_GET['created_from']:"")),
																			    'options'=>array(
																			        'showAnim'		=>	'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
																			        'dateFormat' 	=> 	'dd M yy'
																			    ),
																			    'htmlOptions'=>array(
																			        				'class'			=>	'form-control',
																			        				'placeholder'	=>	'Created From',
																			    ),
																			));
			    		?>
    				</div>
    				<div class="col-xs-12 col-sm-4 col-md-2">
			    		<?php 
			    		$this->widget('zii.widgets.jui.CJuiDatePicker',array(
																			    'name'=>'created_to',
																			    'value'	=>	((isset($_GET['created_to'])?$_GET['created_to']:"")),
																			    'options'=>array(
																			        'showAnim'		=>	'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
																			        'dateFormat' 	=> 	'dd M yy'
																			    ),
																			    'htmlOptions'=>array(
																			        				'class'			=>	'form-control',
																			        				'placeholder'	=>	'Created To',
																			    ),
																			));
			    		?>
    				</div>
    				<div class="col-xs-12 col-sm-4 col-md-2">
    					<select class="form-control" name="created_by">
    						<option value="">--All--</option>
    					<?php foreach ($userlist as $key => $value) { ?>
    						<option value="<?= $value['uid']; ?>" <?= ((isset($_GET['created_by']) && $_GET['created_by']==$value['uid'])?"selected='selected'":"") ?>><?= $value['full_name']; ?></option>
						<?php } ?>
    					</select>
					</div>
    				<div class="col-xs-12 col-sm-4 col-md-2">
			    		<input type="submit" value="Search" class="btn btn-primary btn-md"/>
    				</div>
    				<div class="col-xs-12 col-sm-4 col-md-2">
    					Total Count : <?= $dataCount['TotalCount']; ?>
					</div>
	    		</div>
	    		
	    	</form>
	    		<table class="table table-striped table-bordered bootstrap-datatable responsive">
				    <thead>
					    <tr>
					    	<th>Sl no</th>
					        <th>Name</th>
					        <th>Email</th>
					        <th>Time</th>
					        <th>Status</th>
					        <th>UserType</th>
					        <th>Owner</th>
					        <th>Actions</th>
					        <th>Add Property</th>
					    </tr>
				    </thead>
			    	<tbody>
			    	<?php foreach ($data as $key=>$value){ ?>
					    <tr>
					    	<td class="center">
					    		<?= $value['uid']; ?>
				    		</td>
					        <td class="center">
					        	<?= substr($value['full_name'], 0,50); ?>
					        	<br/>
					        	<?= substr($value['address'], 0,50); ?>
					        </td>
					        <td class="center">
					        	<?= substr($value['email'],0,30); ?>
					        	<br />
					        	<?= substr($value['mobile_no'], 0,30); ?>
					        </td>
					        <td class="center">
					        	C:- <?= date("d-M-Y  H:i:s",$value['created_time']); ?>
					        	<br />
					        	U:- <?= date("d-M-Y  H:i:s",$value['update_time']); ?>
					        </td>
					        <td class="center">
					        	<select name="status" uid="<?php echo $value['uid']; ?>">
					        		<option value="0" <?php echo (($value['status']==0)?"selected='selected'":""); ?>>InActive</option>
					        		<option value="1" <?php echo (($value['status']==1)?"selected='selected'":""); ?>>Active</option>
					        		<option value="2" <?php echo (($value['status']==2)?"selected='selected'":""); ?>>Delete</option>
				        		</select>
					        </td>
					        <td class="center">
					        	<?php if($value['user_type']==3){ ?>
						            <span class="label-success label label-default">Owner</span>
					        	<?php } else if($value['user_type']==4){ ?>
					        		<span class="label-danger label label-default">Agent</span>
					        	<?php } else if($value['user_type']==5){ ?>
					        		<span class="label-warning label label-default">Builder</span>
					        	<?php } ?>
					        </td>
					        <td>
					        	<?= $value['c_full_name']; ?>
					        </td>
					        <td class="text-center">
					            <a class="btn btn-info btn-xs" href="EditUser?uid=<?= $value['uid']; ?>" target="_blank">
					                <i class="glyphicon glyphicon-edit icon-white"></i>
					                Edit
					            </a>
            					<a class="btn btn-primary btn-xs" href="EditUser?step=2&uid=<?= $value['uid']; ?>" target="_blank">
					                <i class="glyphicon glyphicon-edit icon-white"></i>
					                Edit Services
					            </a>
					            <a class="btn btn-danger btn-xs" href="/rights/assignment/user/id/<?= $value['uid']; ?>" data-target="#AssignRoles" target="_blank">
					                <i class="glyphicon glyphicon-cog"></i>
					                Assign Tasks
					            </a>
					        </td>
					        <td>
					        	<a class="btn btn-primary btn-xs" href="AddProperty?prop_id=<?= $value['uid']; ?>" target="_blank">
					                <i class="glyphicon glyphicon-plus"></i>
					                Add Property
					            </a>
					        </td>
					    </tr>
			    	<?php } ?>
		    		</tbody>
	    		</table>
	    		<?php echo $pagination; ?>
    	</div>
    </div>
</div>
<button style="display: none;" class="btn btn-primary noty fadesuccess" data-noty-options='{"text":"User status updated sucessfully","layout":"center","type":"success","animateOpen": {"opacity": "show"}}'>
	<i class="glyphicon glyphicon-bell icon-white"></i> Center (fade)
</button>
<script type="text/javascript">
$(document).ready(function(){
	$('select[name=status]').change(function(){
		var uid = this.getAttribute("uid");
		var currentVal = $(this).val();
		$.ajax({
	        url: '/Users/default/AJAXUpdateUserStatus',
	        type: 'POST',
	        data: {"uid":uid,"newStatus":currentVal},
	        dataType:"json",
	        success: function (data) {
		        $('.fadesuccess').trigger('click');
	        },
	        error:function(e){
	        }
		});
	});
});
</script>