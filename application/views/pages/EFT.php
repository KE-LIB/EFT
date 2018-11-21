<?php 
	
	$this->load->helper('form');

echo form_open('Pages/create'); 
if(isset($message))
{
	echo"<div id=center><span>".$message."<span></div>";
	 //$this->output->set_header('refresh:3; url="http://localhost/new_eft/"');
	
}
	if (isset($child))
	{
		?>
		
		<div style="width:1200px;" class="center-block">
		<div class="panel panel-primary"  >
		<div class="panel-heading clearfix"><b>
		<?php echo $selectedTitle[0]->terulet_kif;
		?></b>
		
		</div>
		<div class="panel-body">
			 <div class="panel-group" id="tabla">
			 <div class="container">
		<?php	
			for($i=0;$i<count($child);$i++)
		{
			echo'<div class="panel panel-default" >
			  <div class="panel-heading">
			  <h4 class="panel-title">
				   <a data-toggle="collapse" href="#cat_'.$child[$i]->t_azon.'"  data-parent="#tabla">
				   '.$child[$i]->terulet_kif.'<div class="pull-right center-block"><span class="glyphicon glyphicon-chevron-down"></div></a>
				</h4>
			  </div>
					<div id="cat_'.$child[$i]->t_azon.'" class="panel-collapse collapse">
						<div class="panel-body">';
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
														$elotag="<span class='hun'>";
													}
													else 
													{
														$elotag="<span class='kulf'>";
													}
													
												echo form_checkbox('valaszt[]', $childchild[$k+1], FALSE).$elotag.$childchild[$k+2]."</span><br>";
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
				  echo '</div></div></div></div>';
				  $attributes = array(
					'class' => 'btn btn-primary',
					);
				  echo form_submit("mehet", "Módosítások mentése",$attributes);
				  $string="</div>";
				  echo form_close($string);
				 
	}
	


	?>
	

