<div class="container-fluid">
<img src=<?php echo base_url()."images/info.png";?> width=50px height=50px title="A módosítással töröljük  az adott témát és újra mindent hozzá kell rendelni!">
<div class="row"><div class="col-sm-8">
<h1>Meglévő témák</h1>
<div style="overflow: auto;height:550px;" id="lvl1them">
<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
	<th scope="col">ID</th>
      <th scope="col">Név</th>
      <th scope="col">Töröl</th>
      <th scope="col">Módosít</th>
    </tr>
  </thead>
  <tbody>
    
<?php
foreach ($temak as $row)
{
echo '<tr id=sor_'.$row->t_azon.'><th scope="row">'.$row->t_azon.'</th>
      <td id=nev_'.$row->t_azon.'>'.$row->terulet_kif.'</td>
      <td> <button onclick=deletethem('.$row->t_azon.')  class="btn btn-danger">Törlés</button></td>
      <td><button onclick=modThem('.$row->t_azon.') class="btn btn-warning">Módosít</button></tr>';	
}

?>
</table>
</div>
</div>
<div class="col-sm-4">
<h1>Új téma felvitele</h1>

<?php
$this->load->helper('form');
echo form_open('Admin/newThemLvl1'); 
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
				  echo form_checkbox('kulfoldi', '1', False)."Külföldi folyóirat";
				  $string="";
				  echo form_close($string);
?>				  
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
		url:"<?php echo base_url(); ?>" + 'index.php/Admin/deleteThem',
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
