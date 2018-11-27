<?php
$this->load->helper('form');
echo $this->upload->display_errors('', '');
echo form_open('Admin/sendEmailContet'); 
if(isset($error))
{
	print_r($error);
}
?><h1>Kérlek mindig az adott file-itt töltsd fel és a megfelelő küldés gombra kattintva küldi ki az emaileket.</h1><br>
fájl feltöltése:<input type=file name="userfile" id="userfile"></td>
<h1>Meglévő újságok</h1>
<div style="overflow: auto;height:550px;" id="lvl1them">
<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Név</th>
      <th scope="col">Hányan figyelik</th>
      <th scope="col">Küldés</th>
  
    </tr>
  </thead>
  <tbody>
    
<?php
$j=0;
$pharse=0;
$hint="";
$emailek="";
$id=0;
$attributes = array(
					'class' => 'btn btn-warning',
					);
//végig megyünk a kapott array-en
for($i=0; $i<count($contents);$i++)
{
	//ha azt az elemeet kapjuk hogy phase2, akkor tudjuk hogy most jönnek az emailek felsorosása
	if($contents[$i]=="phase2")
	{
		$pharse=1;
	}//ha az i még nulla akkor az első sornál tartunk
	if($i==0)
	{
		$id=$contents[$i+1];
		echo '<tr id=sor_'.$contents[$i+1].'>';
	}//ha vége felirat van, akkor mindent nullázunkmert vége egy folyóiratnak jön a következő, ezért kiírjuk a  mehet gombot és a beviteli mezőt
	if($contents[$i]=="Vege" && $i>0)
	{
		$hint=str_replace(",Vege,","",$hint);
		echo $hint.$emailek;
		$pharse=0;
		echo'
      <td>'.form_submit("mehet", $id,$attributes).'<--Küldés</tr><tr id=sor_'.$id.'>';
		$j=0;
	}//ha  a 0 dik fázisnál tartunk akkor az a folyóirat neve, és simán kiírjuk
	elseif($contents[$i]=="phase0")
	{
		$id=$contents[$i+1];
		echo '<th scope="row">'.$contents[$i+2].'</th>';
		
	}//első fázisnál előkészítjük a linket ami megmutatja hogy hányan és kik figyelik ezta folyóiratot
	elseif($contents[$i]=="phase1")
	{
		$hint='<th scope="row"><a href=# title=';
		 $emailek='>'.$contents[$i+1].'</a>';
		$emailek=str_replace("phase2","",$emailek);
	}//amíg a phase 1 addig az a href title mezőjébe pakoljuk az emaileket
	elseif($pharse==1){
	$hint=$hint.$contents[$i+1].',';
	}
		$j++;	  
}
$string="";
				  echo form_close($string);
?>
</table>
</div>
</div>
</div>
</div>