<?php 
$this->load->helper('form');for($i=0;$i<count($terulet);$i++)
	{
	  echo '<li>'.anchor('User/view/EFT?&keres='.$terulet[$i]->t_azon,'<span id=menuk>'.$terulet[$i]->terulet_kif.'</span>').'</li>';
		
	}
	echo"</ul>";
echo form_open('User/create'); 	

		?>
	
		<br/><br/>
		<div style="width:1200px;" class="center-block">
		<div class="panel panel-primary"  >
		<div class="panel-heading clearfix"><b>
		<h1>Megfigyelt folyóiratok</h1></b>
		
		</div>
		<div class="panel-body">
			 <div class="panel-group" id="tabla">
			 <div class="container">
			<?php
			echo '<div class="table-responsive" style="width:70%;"><table class="table table-bordered table-hover"><tr><th>Folyóirat neve</th><th>művelet</th></tr>';
			foreach ($letter as $row)
			{
				echo '<tr><td>'.$row->terulet_kif.'</td><td>'.anchor("User/view/folyoirat?what=".$row->ID,"<span class=glyphicon glyphicon-remove aria-hidden=true></span>töröl");
			}
			echo '</table>';
			?>
	

