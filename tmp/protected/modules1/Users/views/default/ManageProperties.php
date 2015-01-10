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
	    <div class="box-content">
	    	<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
	    		<table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
				    <thead>
					    <tr>
					        <th>Name</th>
					        <th>Land Location</th>
					        <th>Category</th>
					        <th>Status</th>
					        <th>Actions</th>
					    </tr>
				    </thead>
			    	<tbody>
			    	<?php foreach ($Result as $key=>$value){ ?>
					    <tr>
					        <td><?= $value['name']; ?></td>
					        <td class="center"><?= $value['land_location']; ?></td>
					        <td class="center"><?= $value['category_id']; ?></td>
					        <td class="center">
					        	<?php if($value['status']==1){ ?>
						            <span class="label-success label label-default">Active</span>
					        	<?php } else if($value['status']==2){ ?>
					        		<span class="label-danger label label-default">InActive</span>
					        	<?php } else if($value['status']==0){ ?>
					        		<span class="label-warning label label-default">Pending</span>
					        	<?php } ?>
					        </td>
					        <td class="center">
					            <a class="btn btn-success" href="#">
					                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
					                View
					            </a>
					            <a class="btn btn-info" href="EditProperty?id=<?= $value['list_id']; ?>">
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
    		</div>
    	</div>
    </div>
</div>