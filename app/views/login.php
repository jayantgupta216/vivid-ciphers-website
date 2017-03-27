<?php
$this->Template->pageTitle = "Contact";
?>

<div class="logo col-md-3 col-xs-12 center-xs">
 <a class='no-underline' href="/">
	<span class="vivid">Vivid</span>
	<span class="ciphers">Ciphers</span>
	<span class="tag">/></span>
 </a>
</div>

<div class="wrap-max1140px row middle-xs">
<form class="form-horizontal col-xs-12" role="form" method="POST" action="/contact">
	<div class="form-group">
		 <label for="name" class="col-md-4 control-label">User Name</label>

		 <div class="col-md-6">
			  <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
		 </div>
	</div>

	<div class="form-group">
		 <label for="password" class="col-md-4 control-label">Password</label>

		 <div class="col-md-6">
			  <input id="password" type="text" class="form-control" name="password" required>
		 </div>
	</div>

	<div class="form-group">
		 <div class="col-md-6 col-md-offset-4">
			  <button type="submit" class="btn btn-primary">
					<i class="fa fa-btn fa-user"></i> Login
			  </button>
		 </div>
	</div>
</form>
      </div>
    
