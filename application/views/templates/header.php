<!DOCTYPE html>
<html lang="hu" class="no-js">
        <head>
  <title>EFT</title>
  <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url();?>css/normalize.css">
  <link rel="stylesheet" href="<?php echo base_url();?>css/demo.css">
  <link rel="stylesheet" href="<?php echo base_url();?>css/component.css">
  <script src="<?php echo base_url();?>js/jquery-3.2.1.slim.min.js"></script>
  <script src="<?php echo base_url();?>js/modernizr.custom.25376.js"></script>
  <script src="<?php echo base_url();?>js/bootstrap.js"></script>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <link rel="icon" href="<?php echo base_url(); ?>favicon.ico" type="image/gif">
			
        </head>
        <body>
<div id="perspective" class="perspective effect-moveleft">
			<div class="container">
				<div class="wrapper"><!-- wrapper needed for scroll -->
					<!-- Top Navigation -->
					<header class="codrops-header">
	<div class="container">
      <div class="row"><div class="col-sm-3"><img src=<?php echo base_url(); ?>images/head_01.png >
                </div>
				<div class="col-sm-9 "><h3><a href=# style="color:white;"><?php echo $title; ?></a></h3>
				</div>
				</div>
		<div class="row"><div class="col-sm-12">		
		<nav class="navbar navbar-expand-xl sticky-top navbar-dark bg-primary">
		<?php echo anchor('User/view/EFT','Főoldal',"class='navbar-brand'");?>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
            <li class="nav-item " ><?php echo anchor('User/view/folyoirat','Megfigyelt folyóiratok','class="nav-link"');?></li>
            <li class="nav-item"><?php echo anchor('User/view/editProfile','Profilbeállítások','class="nav-link"');?></li>
            <li class="nav-item "><?php echo anchor('User/logout/logout','Kijelentkezés','class="nav-link"');?></li></ul>
        </div><!--/.nav-collapse --> 
		</nav>		
        </div><!--/.col -->    
        </div><!--/.row -->    
        </div><!--/.container -->    
		
		</header>



