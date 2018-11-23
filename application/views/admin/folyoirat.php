		<br/><br/>
		<div class="card card-primary"  >
		<div class="card-title clearfix"><b>
		<h1>Megfigyelt folyóiratok</h1></b>
		
		</div>
		<div class="card-body">
			 <div class="card-text" id="tabla">
			 <div class="container">
			<?php
			echo '<div class="table-responsive" style="width:70%;"><table class="table table-bordered table-hover"><tr><th>Folyóirat neve</th><th>művelet</th></tr>';
			foreach ($letter as $row)
			{
				echo '<tr><td>'.$row->terulet_kif.'</td><td>'.anchor("Admin/view/folyoirat?what=".$row->ID,"<span class=glyphicon glyphicon-remove aria-hidden=true></span>töröl");
			}
			echo '</table>';
			?>
	

