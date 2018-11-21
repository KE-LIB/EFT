	<div class="container">
	<div class="row">
	<div class=col-md-2>
					<button id="showMenu">Témák</button>
					 </div>
					 <div class=col-md-10>
					 <?php
if(isset($message))
{
	echo"<div><h1>".$message."<h1></div>";
	
	
}
	if (isset($child))
	{
		?>
		<div class="card card-primary"  >
		<div class="card-title clearfix"><b>
		<?php echo $selectedTitle[0]->terulet_kif;
		?></b>
		
		</div>
		<div class="card-body">
			 <div class="card-text" id="tabla">
			 <div class="container">
		<?php
		$this->load->helper('form');
		echo form_open('User/create'); 		
		echo '<div ><span style="color:#004d00;">magyar<input type=checkbox id=filter1 onClick=Filter() checked> </span><span style="color: #0099ff;">külföldi </span><input type=checkbox id=filter2 onClick=Filter() checked></div>';
			for($i=0;$i<count($child);$i++)
		{
			echo'<div class="card card-default" >
			  <div class="card-title">
				   <a data-toggle="collapse" href="#cat_'.$child[$i]->t_azon.'"  data-parent="#tabla">
				   '.$child[$i]->terulet_kif.'<div class="pull-right center-block"><span class="glyphicon glyphicon-chevron-down"></div></a>
			  </div>
					<div id="cat_'.$child[$i]->t_azon.'" class="card-collapse collapse">
						<div class="card-body">';
	

						//print_r($childchild);
						for($j=0;$j<count($childchild);$j++)
							{
								if($childchild[$j]=="szulo")
								{
									if($childchild[($j+1)]==$child[$i]->t_azon)
									{
										
										for($k=$j+2;$k<count($childchild);$k++)
										{
											if($childchild[$k]=="szulo"){$j=$k; break;}
											else 
												{
													if($childchild[$k]==0)
													{
														$elotag="<span class='hun' id=hidethis1>";
													}
													else 
													{
														$elotag="<span class='kulf' id=hidethis2>";
													}
													
												echo $elotag.form_checkbox('valaszt[]', $childchild[$k+1], FALSE).$childchild[$k+2]."<br></span>";
												$k=$k+2;
												}
										}
									}
								
								}
							}
					
					echo'</div>
					</div>
					</div>';

		}
				  echo '</div></div></div>';
				  $attributes = array(
					'class' => 'btn btn-primary',
					);
				  echo form_submit("mehet", "Feliratkozás",$attributes);
				  $string="";
				  echo form_close($string);
				 
	}
	else
	{
		echo '
	
		
		<div class="card card-primary"  >
		<div class="card-title clearfix"><b><-- Válassz Témát</b></div>
		<div class="card-body" id="tabla">
			 <div class="card-text" >
			</div>';
	}
	


	?>
					 </div><!-- /col -->
					 </div><!-- /col -->
					 </div><!-- /row -->
					 </div><!-- /col -->
					 </div><!-- /row -->
					 </div><!-- /container -->
					</div><!-- /main -->
				</div><!-- wrapper -->
			</div><!-- /container -->
			
			<nav class="outer-nav right vertical"><br><br>
			<?php
			 for($i=0;$i<count($terulet);$i++)
	{
	  echo anchor('User/view/EFT?&keres='.$terulet[$i]->t_azon,$terulet[$i]->terulet_kif);
		
	}?>
		        
			</nav>
		</div><!-- /perspective -->
		<script src="<?php echo base_url();?>js/classie.js"></script>
		<script src="<?php echo base_url();?>js/menu.js"></script>
