<?php
if(isset($message))
{
	echo"<div id=center><span>".$message."<span></div>";
	 
}
?>
<div style="width:600px;" class="center-block">
		<div class="card card-primary"  >
		<div class="card-heading clearfix"><b>
		Bejelentkezés</b>
		</div>
		<div class="card-body">
<?php
$this->load->helper('form'); 
echo form_open('Login/loginUser');
echo "<label>Felhasználónév:</label><br>";
$data = array(
              'name'        => 'username',
              'id'          => 'username',
              'placeholder'       => 'johndoe',
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:50%',
            );

echo form_input($data);
$data = array(
              'name'        => 'password',
              'id'          => 'password',
              'placeholder' => '********',
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:50%',
			  'type'		=>'password',
            );
echo "<br><label>Jelszó:</label><br>";
echo form_input($data)."<br>";
  $attributes = array(
					'class' => 'btn btn-primary center-block',
					);
				  echo "<br>".form_submit("mehet", "Bejelentkezés",$attributes);
				  $string="</div>";
				  echo form_close($string);
