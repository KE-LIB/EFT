<div class="container-fluid">
<div class="row">
<div class="col-sm-12">
<h1>Új újság felvitele</h1>

<?php
$this->load->helper('form');
echo form_open('Admin/addUjsag'); 
$data = array(
		'type'=>'text',
        'name'  => 'tema',
        'id'    => 'tema',
		'placeholder'=>"Téma neve",
		'class'=>"form-control"
);
echo '<div class="input-group mb-3">';
echo form_input($data);
echo '<div class="input-group-append">';

 $attributes = array(
					'class' => 'btn btn-outline-info',
					);
				  echo form_submit("mehet", "Felvitel",$attributes);
				  echo "</div></div>";
				  echo '<select class="custom-select" name="szulo">
				  <option selected value=0>Válasz szülőt</option>';
    for($i=0;$i<count($szulok)-2;$i++)
	{
		echo'<option value='.$szulok[$i].'>'.$szulok[$i+1].'</option>';
		$i=$i+2;
	}
	
  echo'</select>';
				  echo form_checkbox('kulfoldi', '1', False)."Külföldi folyóirat";
				  $string="";
				  echo form_close($string);
				  
?>				  
</div>
</div>
<div class="row">
<img src=<?php echo base_url()."images/info.png";?> width=50px height=50px title="A módosítással töröljük  az adott témát és újra mindent hozzá kell rendelni!
Ha azt akarjuk hogy ne jelenjen meg valamely újság a listába, csak szedjük ki a pipát, ez visszafelé is müködik.">
<div class="col-sm-12">
<h1>Meglévő újságok</h1>
<div style="overflow: auto;height:550px;" id="lvl1them">
<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
	<th scope="col">ID</th>
      <th scope="col">Név</th>
      <th scope="col">szülő</th>
      <th scope="col">Eft-ben Megjelenet</th>
      <th scope="col">Eka-ben Megjelenet</th>
      <th scope="col">Töröl</th>
      <th scope="col">Módosít</th>
    </tr>
  </thead>
  <tbody>
    
<?php

for($i=0; $i<count($temak)-4;$i++)
{
echo '<tr id=sor_'.$temak[$i].'><th scope="row">'.$temak[$i].'</th>
      <td id=nev_'.$temak[$i].'>'.$temak[$i+1].'</td>
      <td>'.$temak[$i+2].'</td>
      <td>';if($temak[$i+3]==1)
	  {
		  echo form_checkbox('eft_megjelent_'.$temak[$i], '1', true,"onclick='changeEFT(".$temak[$i].")'")."Megjelent";
	  }
	  else
	  {
		 echo form_checkbox('eft_megjelent_'.$temak[$i], '0', false,"onclick='changeEFT(".$temak[$i].")'")."Nem jelent meg"; 
	  }echo'</td>
      <td>';if($temak[$i+4]==1)
	  {
		  echo form_checkbox('eka_megjelent_'.$temak[$i], '1', true,"onclick='changeEKA(".$temak[$i].")'")."Megjelent";
	  }
	  else
	  {
		 echo form_checkbox('eka_megjelent_'.$temak[$i], '0', false,"onclick='changeEKA(".$temak[$i].")'")."Nem jelent meg"; 
	  }echo'</td>
      <td> <button onclick=deletethem('.$temak[$i].')  class="btn btn-danger">Törlés</button></td>
      <td><button onclick=modThem('.$temak[$i].') class="btn btn-warning">Módosít</button></tr>';
$i=$i+4;	  
}

?>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script>
function deletethem(id)
{
	$.ajax(
	{
		type:"POST",
		url:"<?php echo base_url(); ?>" + 'index.php/Admin/deleteAlThem',
		data:"id="+id,
		success:function(result)
				{
					$("#lvl1them").html(result);
				}
	});		
}
function changeEFT(id)
{

	$.ajax(
	{
		type:"POST",
		url:"<?php echo base_url(); ?>" + 'index.php/Admin/EFTmegjelent',
		data:"id="+id,
		success:function(result)
				{
					$("#lvl1them").html(result);
				}
	});		
}
function changeEKA(id)
{

	$.ajax(
	{
		type:"POST",
		url:"<?php echo base_url(); ?>" + 'index.php/Admin/EKAmegjelent',
		data:"id="+id,
		success:function(result)
				{
					$("#lvl1them").html(result);
				}
	});		
}
function modThem(id)
{
var nev=($("#nev_"+id).html());
	deletethem(id)
	$("#tema").val(nev)
	/*$.ajax(
	{
		type:"POST",
		url:"<?php echo base_url(); ?>" + 'index.php/Admin/modThem',
		data:"id="+id,
		success:function(result)
				{
					$("#lvl1them").html(result);
				}
	});		*/
}
</script>
