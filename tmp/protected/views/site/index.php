<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-8">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs category-home-tabs" role="tablist">
			<li class="active"><a href="#home" role="tab" data-toggle="tab">Commercial Properties</a></li>
			<li><a href="#profile" role="tab" data-toggle="tab">Residential Property</a></li>
			<li><a href="#messages" role="tab" data-toggle="tab">Farm &amp; Agriculture</a></li>
			<li><a href="#settings" role="tab" data-toggle="tab">For Developers</a></li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
			<div class="tab-pane fade active in" id="home">
				<?php 
				foreach ($DataList['commercialProperty'] as $key=>$val){ ?>
					<div class="row property-list-info">
						<div class="col-xs-12 col-sm-9 col-md-9 left-shor-info">
							<div class="row">
								<div class="col-xs-12 col-sm-4 col-md-4 property-image">
									<img alt="" class="thumbnail" src="<?php echo $this->assetsBase."/images/logo.jpg"; //$val['image_locator']; ?>">
								</div>
								<div class="col-xs-12 col-sm-8 col-md-8">
									<h6><?= strtoupper($val['name']); ?></h6>
									<p><i class="fa fa-inr"></i> <?= $val['price']; ?></p>
									<small class="text-muted"> <?= $val['property_title']; ?></small>
									<p><i class="fa fa-arrows"></i> <?= $val['area']; ?> &nbsp; <?= $val['area_unit']; ?> </p>
									<a href="" class="btn btn-sm btn-warning">View more</a>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-3 col-md-3 right-shor-info">
							<small> Posted On : <?= date('dS M y',$val['posted_date']); ?></small>
							<p>
								<img alt="" class="thumbnail" src="<?php echo $this->assetsBase."/images/usrlogo.jpg.jpg"; ?>">
							</p>
						</div>
					</div>
				<?php } ?>
			
			
			</div>
			<div class="tab-pane fade" id="profile">
			<?php 
				foreach ($DataList['residentialProperty'] as $key=>$val){ ?>
					<div class="row property-list-info">
						<div class="col-xs-12 col-sm-9 col-md-9 left-shor-info">
							<div class="row">
								<div class="col-xs-12 col-sm-4 col-md-4 property-image">
									<img alt="" class="thumbnail" src="<?php echo $this->assetsBase."/images/logo.jpg"; //$val['image_locator']; ?>">
								</div>
								<div class="col-xs-12 col-sm-8 col-md-8">
									<h6><?= strtoupper($val['name']); ?></h6>
									<p><i class="fa fa-inr"></i> <?= $val['price']; ?></p>
									<small class="text-muted"> <?= $val['property_title']; ?></small>
									<p><i class="fa fa-arrows"></i> <?= $val['area']; ?> &nbsp; <?= $val['area_unit']; ?> </p>
									<a href="" class="btn btn-sm btn-warning">View more</a>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-3 col-md-3 right-shor-info">
							<small> Posted On : <?= date('dS M y',$val['posted_date']); ?></small>
							<p>
								<img alt="" class="thumbnail" src="<?php echo $this->assetsBase."/images/usrlogo.jpg.jpg"; ?>">
							</p>
						</div>
					</div>
				<?php } ?>
			</div>
			<div class="tab-pane fade" id="messages">
			<?php 
				foreach ($DataList['agricultureProperty'] as $key=>$val){ ?>
					<div class="row property-list-info">
						<div class="col-xs-12 col-sm-9 col-md-9 left-shor-info">
							<div class="row">
								<div class="col-xs-12 col-sm-4 col-md-4 property-image">
									<img alt="" class="thumbnail" src="<?php echo $this->assetsBase."/images/logo.jpg"; //$val['image_locator']; ?>">
								</div>
								<div class="col-xs-12 col-sm-8 col-md-8">
									<h6><?= strtoupper($val['name']); ?></h6>
									<p><i class="fa fa-inr"></i> <?= $val['price']; ?></p>
									<small class="text-muted"> <?= $val['property_title']; ?></small>
									<p><i class="fa fa-arrows"></i> <?= $val['area']; ?> &nbsp; <?= $val['area_unit']; ?> </p>
									<a href="" class="btn btn-sm btn-warning">View more</a>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-3 col-md-3 right-shor-info">
							<small> Posted On : <?= date('dS M y',$val['posted_date']); ?></small>
							<p>
								<img alt="" class="thumbnail" src="<?php echo $this->assetsBase."/images/usrlogo.jpg.jpg"; ?>">
							</p>
						</div>
					</div>
				<?php } ?>
			</div>
			<div class="tab-pane fade" id="settings">
			<?php 
				foreach ($DataList['developersProperty'] as $key=>$val){ ?>
					<div class="row property-list-info">
						<div class="col-xs-12 col-sm-9 col-md-9 left-shor-info">
							<div class="row">
								<div class="col-xs-12 col-sm-4 col-md-4 property-image">
									<img alt="" class="thumbnail" src="<?php echo $this->assetsBase."/images/logo.jpg"; //$val['image_locator']; ?>">
								</div>
								<div class="col-xs-12 col-sm-8 col-md-8">
									<h6><?= strtoupper($val['name']); ?></h6>
									<p><i class="fa fa-inr"></i> <?= $val['price']; ?></p>
									<small class="text-muted"> <?= $val['property_title']; ?></small>
									<p><i class="fa fa-arrows"></i> <?= $val['area']; ?> &nbsp; <?= $val['area_unit']; ?> </p>
									<a href="" class="btn btn-sm btn-warning">View more</a>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-3 col-md-3 right-shor-info">
							<small> Posted On : <?= date('dS M y',$val['posted_date']); ?></small>
							<p>
								<img alt="" class="thumbnail" src="<?php echo $this->assetsBase."/images/usrlogo.jpg.jpg"; ?>">
							</p>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-4">
	</div>
</div>