<?php //CVarDumper::dump($Result,10,true); ?>

<div class="box col-md-12">
    <div class="box-inner">
	    <div class="box-header well" data-original-title="">
	        <h2><i class="glyphicon glyphicon-user"></i> Datatable + Responsive</h2>
	
	        <div class="box-icon">
	            <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
	            <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
	            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
	        </div>
	    </div>
		<table class="table table-striped table-bordered bootstrap-datatable responsive">
		    <thead>
			    <tr>
			        <th>Name</th>
			        <th>Land Location</th>
			        <th>Property Category</th>
			        <th>Property For</th>
			        <th>City</th>
			        <th>Status</th>
			        <th>Actions</th>
			    </tr>
		    </thead>
	    	<tbody>
	    	<?php foreach ($Result as $key=>$value){ ?>
			    <tr>
			        <td><?= $value['name']; ?></td>
			        <td class="center"><?= $value['location']; ?></td>
			        <td class="center"><?= $value['category_name']; ?></td>
			        <td class="center"><?= (($value['property_for']==1)?"SALE":(($value['property_for']==2)?"RENT":"NONE")); ?></td>
			        <td class="center"><?= $value['city_name']; ?></td>
			        <td class="center">
			        	<select name="status" uid="<?php echo $value['created_by']; ?>">
			        		<option value="0" <?php echo (($value['status']==0)?"selected='selected'":""); ?>>InActive</option>
			        		<option value="1" <?php echo (($value['status']==1)?"selected='selected'":""); ?>>Active</option>
			        		<option value="2" <?php echo (($value['status']==2)?"selected='selected'":""); ?>>Delete</option>
		        		</select>
			        </td>
			        <td class="center">
			            <a class="btn btn-success" href="#">
			                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
			                View
			            </a>
			            <a class="btn btn-info" href="EditProperty?id=<?= $value['id']; ?>">
			                <i class="glyphicon glyphicon-edit icon-white"></i>
			                Edit
			            </a>
			            <a class="btn btn-danger" href="#">
			                <i class="glyphicon glyphicon-trash icon-white"></i>
			                Delete
			            </a>
			        </td>
			    </tr>
	    	<?php } ?>
    		</tbody>
		</table>
		<?php echo $pagination; ?>
    </div>
</div>