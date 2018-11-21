<?php 
$this->load->helper('form');
echo form_open('User/create'); 	
for($i=0;$i<count($terulet);$i++)
	{
	  echo '<li>'.anchor('User/view/EFT?&keres='.$terulet[$i]->t_azon,'<span id=menuk>'.$terulet[$i]->terulet_kif.'</span>').'</li>';
		
	}
	echo"</ul>";

echo form_close();
echo form_open('User/edit'); 
		?>
	
		<br/><br/>
		<div style="width:1200px;" class="center-block">
		<div class="panel panel-primary"  >
		<div class="panel-heading clearfix"><b>
		<h1>Profil szerkesztése</h1></b>
		
		</div>
		<div class="panel-body">
			 <div class="panel-group" id="tabla">
			 <div class="container">
			<?php
if(isset($message))
{
	echo"<div><h1>".$message."<h1></div>";
	
	
}
			
			
			foreach ($email as $row)
			{
				$data = array(
				'name'          => 'be_name',
				'id'            => '1',
				'class'     	=> 'form-control',
				'maxlength'		=>'70',
				'required'		=>'required',
				'type'			=>'email',
				'value'			=> $row->e_mail,
);
			}
		echo form_input($data);
		$attributes = array(
					'class' => 'btn btn-primary',
					);
echo form_submit("lks", "Módosít",$attributes);
echo form_close();
			?>
	

