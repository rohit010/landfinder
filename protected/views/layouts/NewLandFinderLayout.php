<!DOCTYPE HTML>
<html>
<head>
<title>LandFInder</title>
<link href="<?= $this->assetsBase.'/dhoot-pack/css/bootstrap.css'; ?>" rel='stylesheet' type='text/css' />
<link href="<?= $this->assetsBase.'/dhoot-pack/css/style.css'; ?>" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="<?= $this->assetsBase.'/dhoot-pack/js/jquery-1.11.1.min.js'; ?>"></script>
<script type="text/javascript" src="<?= $this->assetsBase.'/dhoot-pack/js/login.js'; ?>"></script>
<script type="text/javascript" src="<?= $this->assetsBase.'/dhoot-pack/js/jquery.easydropdown.js'; ?>"></script>
<!--Animation-->

<script src="<?= $this->assetsBase.'/dhoot-pack/js/wow.min.js'; ?>"></script>
<link href="<?= $this->assetsBase.'/dhoot-pack/css/animate.css'; ?>" rel='stylesheet' type='text/css' />
<script>
	new WOW().init();
</script>
</head>
<body>
<div class="header">
		   <div class="header-left">
					 <div class="logo">
						<a href="index.html"><img src="<?= $this->assetsBase; ?>/dhoot-pack/images/logo.png" alt=""/></a>
					 </div>
					 <div class="menu">
						  <a class="toggleMenu" href="#"><img src="<?= $this->assetsBase; ?>/dhoot-pack/images/nav.png" alt="" /></a>
						    <ul class="nav" id="nav">
						    	<li class="active"><a href="index.html">Reality</a></li>
						    	<li><a href="living.html">Living</a></li>
						    	<li><a href="education.html">Education</a></li>
						    	<li><a href="entertain.html">Entertainment</a></li>
						    	<li><a href="404.html">Mobility</a></li>
								<div class="clearfix"></div>
							</ul>
							<script type="text/javascript" src="<?= $this->assetsBase.'/dhoot-pack/js/responsive-nav.js'; ?>"></script>
				    </div>							
	    		    <div class="clearfix"></div>
	    	    </div>
	            <div class="header_right">
	    		  <!-- start search-->
				      <div class="search-box">
							<div id="sb-search" class="sb-search">
								<form>
									<input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
									<input class="sb-search-submit" type="submit" value="">
									<span class="sb-icon-search"> </span>
								</form>
							</div>
						</div>
						<!----search-scripts---->
						<script src="<?= $this->assetsBase; ?>/dhoot-pack/js/classie.js"></script>
						<script src="<?= $this->assetsBase; ?>/dhoot-pack/js/uisearch.js"></script>
						<script>
							new UISearch( document.getElementById( 'sb-search' ) );
						</script>
						<!----//search-scripts---->
				       <div id="loginContainer"><a href="#" id="loginButton"><img src="<?= $this->assetsBase; ?>/dhoot-pack/images/login.png"><span>Login</span></a>
						    <div id="loginBox">                
						        <form id="loginForm">
						                <fieldset id="body">
						                	<fieldset>
						                          <label for="email">Email Address</label>
						                          <input type="text" name="email" id="email">
						                    </fieldset>
						                    <fieldset>
						                            <label for="password">Password</label>
						                            <input type="password" name="password" id="password">
						                     </fieldset>
						                    <input type="submit" id="login" value="Sign in">
						                	<label for="checkbox"><input type="checkbox" id="checkbox"> <i>Remember me</i></label>
						            	</fieldset>
						                 <span><a href="#">Forgot your password?</a></span>
							      </form>
				              </div>
			             </div>
		                 <div class="clearfix"></div>
	                 </div>
	                <div class="clearfix"></div>
   </div>
   <?php echo $content; ?>
   
   
   </div>
   <div class="footer">
   	<div class="container">
   	 <div class="footer_top">
   	   <h3>Subscribe to our newsletter</h3>
   	   <form>
		<span>
			<i><img src="<?= $this->assetsBase; ?>/dhoot-pack/images/mail.png" alt=""></i>
		    <input type="text" value="Enter your email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter your email';}">
		    <label class="btn1 btn2 btn-2 btn-2g"> <input name="submit" type="submit" id="submit" value="Subscribe"> </label>
		    <div class="clearfix"> </div>
		</span>			 	    
	   </form>
	  </div>
	  <div class="footer_grids">
	     <div class="footer-grid">
			<h4>Ipsum Quis</h4>
			<ul class="list1">
				<li><a href="contact.html">Contact</a></li>
				<li><a href="#">Mirum est</a></li>
				<li><a href="#">placerat facer</a></li>
				<li><a href="#">claritatem</a></li>
				<li><a href="#">sollemnes </a></li>
			</ul>
		  </div>
		  <div class="footer-grid">
			<h4>Quis Ipsum</h4>
			<ul class="list1">
				<li><a href="#">placerat facer</a></li>
				<li><a href="#">claritatem</a></li>
				<li><a href="#">sollemnes </a></li>
				<li><a href="#">Claritas</a></li>
				<li><a href="#">Mirum est</a></li>
			</ul>
		  </div>
		  <div class="footer-grid last_grid">
			<h4>Follow Us</h4>
			<ul class="footer_social wow fadeInLeft" data-wow-delay="0.4s">
			  <li><a href=""> <i class="fb"> </i> </a></li>
			  <li><a href=""><i class="tw"> </i> </a></li>
			  <li><a href=""><i class="google"> </i> </a></li>
			  <li><a href=""><i class="u_tube"> </i> </a></li>
		 	</ul>
		 	<div class="copy wow fadeInRight" data-wow-delay="0.4s">
              <p>&copy; Template by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
	        </div>
		  </div>
		  <div class="clearfix"> </div>
	   </div>
      </div>
   </div>
</body>
</html>		