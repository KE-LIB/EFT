
<h1>Meglévő Felhasználók</h1>
<div style="overflow: auto;height:550px;" id="lvl1them">
<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
	<th scope="col">ID</th>
      <th scope="col">Név</th>
      <th scope="col">Email</th>
      <th scope="col">Admin</th>
      <th scope="col">Aktív</th>
    </tr>
  </thead>
  <tbody>
    
<?php

foreach($users as $row)
{
echo '<tr id=sor_'.$row->f_azon.'><th scope="row">'.$row->f_azon.'</th>
      <td id=nev_'.$row->f_azon.'>'.$row->teljes_nev.'</td>
      <td>'.$row->e_mail.'</td>
      <td>'.$row->admin.'</td>
      <td>'.$row->aktiv.'</td>';
}

?>
</table>
</div>
</div>