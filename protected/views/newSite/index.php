<div class="banner wow fadeInUp" data-wow-delay="0.4s">
	<div class="container_wrap">
		<form id="searchform">
   			<h1>What are you looking for?</h1>
   	    	<div class="dropdown-buttons">   
            	<div class="dropdown-button">
            		<select class="dropdown" name="CatList" id="CatList" tabindex="9" data-settings='{"wrapperClass":"flat"}'>
            			<option value="">-- Select Category --</option>
	            		<?php foreach ($CatList as $key => $value) { ?>
		            		<option value="<?= $value['category_id']; ?>"><?= $value['category_name']; ?></option>	
					  	<?php } ?>           			
					</select>
				</div>
				<div class="dropdown-button">
					<select class="dropdown" name="SubCatList" id ="SubCatList" tabindex="9" data-settings='{"wrapperClass":"flat"}'>
						<option value="">--Please Select Category--</option>
						<option value=""></option>
						<option value=""></option>
				  	</select>
				</div>
			</div>  
		   
			<input type="text" value="" name="keywords"  placeholder="Keyword, name, date, ..." >
		    <div class="contact_btn">
               <label class="btn1 btn-2 btn-2g"><input type="submit" id="submit" value="Search"></label>
            </div>
   		    <div class="clearfix"></div>
		</form>        		
	</div>
</div>
   <div class="content_top wow bounceInRight" data-wow-delay="0.4s">
   	  <div class="container">
   		<div class="col-md-4 bottom_nav">
   		   <div class="content_menu">
				<ul>
					<li class="active"><a href="#">Recommended</a></li> 
					<li><a href="#">Latest</a></li> 
					<li><a href="#">Highlights</a></li> 
				</ul>
			</div>
		</div>
		<div class="col-md-4 content_dropdown1">
		   <div class="content_dropdown">    
		       <select class="dropdown" tabindex="10" data-settings='{"wrapperClass":"metro"}'>
            			<option value="0">Dubai</option>	
						<option value="1">tempor</option>
						<option value="2">congue</option>
						<option value="3">mazim </option>
						<option value="4">mutationem</option>
						<option value="5">hendrerit </option>
						<option value="5"></option>
						<option value="5"></option>
		        </select>
		     </div>
		     <div class="content_dropdown">    
		       <select class="dropdown" tabindex="10" data-settings='{"wrapperClass":"metro"}'>
            			<option value="0">Show Map</option>	
						<option value="1">tempor</option>
						<option value="2">congue</option>
						<option value="3">mazim </option>
						<option value="4">mutationem</option>
						<option value="5">hendrerit </option>
						<option value="5"></option>
						<option value="5"></option>
		        </select>
		       </div>
		</div>
		<div class="col-md-4 filter_grid">
			<ul class="filter">
				<li class="fil">Filter :</li>
				<li><a href=""> <i class="icon1"> </i> </a></li>
				<li><a href=""> <i class="icon2"> </i> </a></li>
				<li><a href=""> <i class="icon3"> </i> </a></li>
				<li><a href=""> <i class="icon4"> </i> </a></li>
				<li><a href=""> <i class="icon5"> </i> </a></li>
			</ul>
		</div>
   	</div>
   </div>
   
   <div class="content_middle wow bounceInLeft" data-wow-delay="0.4s">
   	  <div class="container">
   	    <div class="content_middle_box">
          <div class="top_grid">
          	<?php foreach ($DataList['agricultureProperty'] as $key => $value) { ?>
	   			<div class="col-md-3">
	   			  <div class="grid1">
	   				<div class="view view-first">
	                  <div class="index_img">
	                  	<img src="<?= $value['property_image']; ?>" class="img-responsive" alt="" style="width:100%;height: 152px"/></div>
	   				    <div class="sale"><?= $value['total_sale_price']; ?></div>
	   			          <div class="mask">
	                        <div class="info"><i class="search"> </i> Show More</div>
	                        <ul class="mask_img">
	                        	<li class="star"><img src="<?= $this->assetsBase; ?>/dhoot-pack/images/star.png" alt=""/></li>
	                        	<li class="set"><img src="<?= $this->assetsBase; ?>/dhoot-pack/images/set.png" alt=""/></li>
	                        	<div class="clearfix"> </div>
	                        </ul>
	                       </div>
	                   </div> 
	                   <i class="home"></i>
	   				 <div class="inner_wrap">
	   				 	<h3><?= $value['name']; ?></h3>
	   				 	<ul class="star1">
	   				 	  <h4 class="green"><?= $value['full_name']; ?></h4>
	   				 	  <li><a href="#"> <img src="<?= $this->assetsBase; ?>/dhoot-pack/images/star2.png" alt="">(236)</a></li>
	   				 	</ul>
	   				 </div>
	   			   </div>
	   			</div>
				  
			  <?php } ?>
   			<div class="clearfix"> </div>
   		</div>
   		  </div>
   		  <div class="offering">
   		  	  <h2>What can DuHoot offer to you ?</h2>
   		  	  <h3>Ut wisi enim ad minim veniam, quis</h3>
   		  	  <ul class="icons wow fadeInUp" data-wow-delay="0.4s">
   		  	  	 <li><i class="icon1"> </i><span class="one"> </span></li>
   		  	  	 <li><i class="icon2"> </i><span class="two"> </span></li>
   		  	  	 <li><i class="icon3"> </i><span class="three"> </span></li>
   		  	  	 <li><i class="icon4"> </i><span class="four"> </span></li>
   		  	  	 <li><i class="icon5"> </i></li>
   		  	  </ul>
   		  	  <div class="real">
   		  	  	<h4>Reality</h4>
   		  	  	<div class="col-sm-6">
   		  	  	  <ul class="service_grid">
   	   				<i class="s1"> </i>
   	   				 <li class="desc1 wow fadeInRight" data-wow-delay="0.4s">
   	   				   <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum</p>
   	   				 </li>
   	   				 <div class="clearfix"> </div>
   	   			   </ul>
   	   			 </div>
   	   			 <div class="col-sm-6">
   		  	  	  <ul class="service_grid">
   	   				<i class="s2"> </i>
   	   				 <li class="desc1 wow fadeInRight" data-wow-delay="0.4s">
   	   				   <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum</p>
   	   				 </li>
   	   				 <div class="clearfix"> </div>
   	   			   </ul>
   	   			 </div>
   	   			 <div class="clearfix"> </div>
   	   			 </div>
   		  	  </div>
   		  </div>
   	  </div>
   	  <style>
   	  	.grid1{
   	  		margin:10px auto;
   	  	}
   	  </style>
   	  <script>
		$(document).ready(function(){
	   		$('#CatList').on('change',function(){
	   			var catId = $(this).val();
	   			if(catId!=""){
	   				
	   				$.ajax({
					 	url: '/NewSite/AJAXGetSubCatList',
				        type: 'GET',
				        data: {'catId':catId},
				        dataType:"json",
				        success: function (data) {
				        	var updatedData = updatedDataList = "";
				        	if(data.status==200){
					        	$.each(data.msg,function(i,k){
					        		updatedData += "<option value='"+k.subcategory_parent_id+"'>"+k.subcategory_parent_name+"</option>";
					        		updatedDataList += "<li class='"+((i==0)?"active":"")+"'>"+k.subcategory_parent_name+"</li>";
					        	});
					        	$('#SubCatList').html(updatedData);
					        	$('#SubCatList').parent().parent().find('ul').html(updatedDataList+'<li class=""></li><li class=""></li>');
					        	$('#SubCatList').parent().parent().find('ul').parent().css({"min-height":"200px"});
					        	$('#SubCatList').parent().parent().find('ul').parent().parent().addClass("focus open");
					        	$('#SubCatList').parent().next('.selected').html(data.msg[0].subcategory_parent_name);
				        	}
				        	
				        }
			 		});
	   			} 
	   	  	});		
	   	  	$('#searchform').on('submit',function(){
	   	  		windows.location=$(this).serialize();
	   	  		return false;
	   	  	});
  		});
   	  	
   	  	
   	  </script>