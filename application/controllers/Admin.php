<?php
class Admin extends CI_Controller {
	   public function __construct()
       {
            parent::__construct();
            if(isset($_COOKIE['user']))
			{}
		else
		{
			redirect('/Login/view/login', 'refresh');
		}
       }

        public function view($page = 'EFT')
        {
			  if ( ! file_exists(APPPATH.'views/admin/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		$this->load->database();
        $data['title'] = "Az Egyetemi Könyvtár Elektronikus Folyóirat Tartalomjegyzék Szolgáltatása"; // the title of the page
       
		$this->load->model('Left_model');
		$resMain=$this->Left_model->getMainTitle();
		$data['email']=$this->Left_model->getProfile();
		$newsletter=$this->Left_model->getUserNewsLetter();
		$data['letter']=$newsletter;
		$data['terulet']=$resMain;
		 $this->load->view('templates/headerAdmin', $data);
		 
			if (isset($_GET['keres']))
			{
			$resChild=$this->Left_model->getChild($_GET['keres']);
			$data['child']=$resChild;
			$mainTitle=$this->Left_model->getSelectedTitle($_GET['keres']);
			$data['selectedTitle']=$mainTitle;
			$childchild=$this->Left_model->getChildrenChild($_GET['keres']);
			$data['childchild']=$childchild;
			}
		$this->load->view('admin/'.$page, $data);
		 $this->load->view('templates/footer', $data);
		 if(isset($_GET['what']))
			{
				$this->Left_model->deleteFromNews($_GET['what']);
				redirect('/Admin/view/folyoirat', 'refresh');
			}
     }
public function create()
	{
    $this->load->helper('form'); 
    $this->load->library('form_validation');
    $this->form_validation->set_rules('valaszt[]', 'Valaszt', 'required');
	 $data['title'] = "Az Egyetemi Könyvtár Elektronikus Folyóirat Tartalomjegyzék Szolgáltatása"; // the title of the page
	 $this->load->model('Left_model');
		$resMain=$this->Left_model->getMainTitle();
		$data['terulet']=$resMain;
        $this->load->view('templates/headerAdmin', $data);
		
	 if ($this->form_validation->run() === FALSE)
    {
		$data['message']="Ki Kell jelőlni egy elemet!!";
		 $this->load->view('admin/EFT', $data);      
    }
    else
    {
		$this->Left_model->set_eft();
		$data['message']="Sikeresen Rögzítetted a kérést!!!";
        $this->load->view('Admin/EFT', $data);

    }

	 $this->load->view('templates/footer', $data);
	}
	public function edit()
	{
    $this->load->helper('form'); 
    $this->load->library('form_validation');
    $this->form_validation->set_rules('be_name', 'be_name', 'required');
	 $data['title'] = "Az Egyetemi Könyvtár Elektronikus Folyóirat Tartalomjegyzék Szolgáltatása"; // the title of the page
	 $this->load->model('Left_model');
		$resMain=$this->Left_model->getMainTitle();
		$data['terulet']=$resMain;
        $this->load->view('templates/headerAdmin', $data);
		
	 if ($this->form_validation->run() === FALSE)
    {
		$this->load->model('Left_model');
		$data['email']=$this->Left_model->getProfile();
		$data['message']="Ki Kell Tölteni a mezőt!!";
		 $this->load->view('admin/editProfile', $data);      
    }
    else
    {
		$this->load->model('Left_model');
		$data['email']=$this->Left_model->getProfile();
		$this->Left_model->set_profile();
		$data['message']="Sikeresen Rögzítetted a kérést!!!";
        redirect('/Admin/view/editProfile', 'refresh');

    }

	 $this->load->view('templates/footer', $data);
	}
		public function logout()
	{
		$this->load->helper('cookie');
			delete_cookie("uid");
			setcookie("uid","",time()-7200);
			redirect('/Login/view/login', 'refresh');
	}
	public function newThem($page="newThem")
	{
		$this->load->model('Left_model');
		$data['temak']=$this->Left_model->getlvl1Them();
		$data['title'] = "Az Egyetemi Könyvtár Elektronikus Folyóirat Tartalomjegyzék Szolgáltatása";
		$this->load->view('templates/headerAdmin', $data);
		$this->load->view('admin/'.$page, $data);
		 $this->load->view('templates/footer', $data);
	}
	public function newAlThem($page="newAlThem")
	{
		$this->load->model('Left_model');
		$data['temak']=$this->Left_model->getlvl2Them();
		$data['szulok']=$this->Left_model->getlvl1Them();
		$data['title'] = "Az Egyetemi Könyvtár Elektronikus Folyóirat Tartalomjegyzék Szolgáltatása";
		$this->load->view('templates/headerAdmin', $data);
		$this->load->view('admin/'.$page, $data);
		 $this->load->view('templates/footer', $data);
	}
	public function newThemLvl1($page="newThem")
	{
		$this->load->model('Left_model');
		$this->Left_model->newThemLvl1();
		$data['temak']=$this->Left_model->getlvl1Them();
		$data['title'] = "Az Egyetemi Könyvtár Elektronikus Folyóirat Tartalomjegyzék Szolgáltatása";
		$this->load->view('templates/headerAdmin', $data);
		$this->load->view('admin/'.$page, $data);
		$this->load->view('templates/footer', $data);
	}
	public function newThemLvl2($page="newAlThem")
	{
		$this->load->model('Left_model');
		$this->Left_model->newThemLvl2();
		$data['temak']=$this->Left_model->getlvl2Them();
		$data['szulok']=$this->Left_model->getlvl1Them();
		$data['title'] = "Az Egyetemi Könyvtár Elektronikus Folyóirat Tartalomjegyzék Szolgáltatása";
		$this->load->view('templates/headerAdmin', $data);
		$this->load->view('admin/'.$page, $data);
		$this->load->view('templates/footer', $data);
	}
	public function deleteThem()
	{
		
		$this->load->model('Left_model');
		$this->Left_model->deleteThem();
		$temak=$this->Left_model->getlvl1Them();
		echo'<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
	<th scope="col">ID</th>
      <th scope="col">Név</th>
      <th scope="col">Töröl</th>
      <th scope="col">Módosít</th>
    </tr>
  </thead>
  <tbody>
    <tr>';

foreach ($temak as $row)
{
echo '<th scope="row">'.$row->t_azon."</th>
      <td>".$row->terulet_kif."</td>
      <td> <button onclick=deletethem(".$row->t_azon.")  class='btn btn-danger'>Törlés</button></td>
      <td><button onclick=modThem('".$row->t_azon."') class='btn btn-warning'>Módosít</button></tr><tr>";	
}
echo'
</table>
</div>';
	}
	public function deleteAlThem()
	{
		
		$this->load->model('Left_model');
		$this->Left_model->deleteThem();
		$temak=$this->Left_model->getlvl2Them();
		$szulok=$this->Left_model->getlvl1Them();
		$data['title'] = "Az Egyetemi Könyvtár Elektronikus Folyóirat Tartalomjegyzék Szolgáltatása";
		echo'<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
	<th scope="col">ID</th>
      <th scope="col">Név</th>
      <th scope="col">szülő</th>
      <th scope="col">Töröl</th>
      <th scope="col">Módosít</th>
    </tr>
  </thead>
  <tbody>';
for($i=0; $i<count($temak);$i++)
{
echo '<tr id=sor_'.$temak[$i].'><th scope="row">'.$temak[$i].'</th>
      <td id=nev_'.$temak[$i].'>'.$temak[$i+1].'</td>
      <td>'.$temak[$i+2].'</td>
      <td> <button onclick=deletethem('.$temak[$i].')  class="btn btn-danger">Törlés</button></td>
      <td><button onclick=modThem('.$temak[$i].') class="btn btn-warning">Módosít</button></tr>';
$i=$i+2;	  
}

echo'
</table>
</div>';
	}

}