<?php
class User extends CI_Controller {
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
			  if ( ! file_exists(APPPATH.'views/user/'.$page.'.php'))
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
		 $this->load->view('templates/header', $data);
		 
			if (isset($_GET['keres']))
			{
			$resChild=$this->Left_model->getChild($_GET['keres']);
			$data['child']=$resChild;
			$mainTitle=$this->Left_model->getSelectedTitle($_GET['keres']);
			$data['selectedTitle']=$mainTitle;
			$childchild=$this->Left_model->getChildrenChild($_GET['keres']);
			$data['childchild']=$childchild;
			}
		$this->load->view('user/'.$page, $data);
		 $this->load->view('templates/footer', $data);
		 if(isset($_GET['what']))
			{
				$this->Left_model->deleteFromNews($_GET['what']);
				redirect('/User/view/folyoirat', 'refresh');
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
        $this->load->view('templates/header', $data);
		
	 if ($this->form_validation->run() === FALSE)
    {
		$data['message']="Ki Kell jelőlni egy elemet!!";
		 $this->load->view('user/EFT', $data);      
    }
    else
    {
		$this->Left_model->set_eft();
		$data['message']="Sikeresen Rögzítetted a kérést!!!";
        $this->load->view('User/EFT', $data);

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
        $this->load->view('templates/header', $data);
		
	 if ($this->form_validation->run() === FALSE)
    {
		$this->load->model('Left_model');
		$data['email']=$this->Left_model->getProfile();
		$data['message']="Ki Kell Tölteni a mezőt!!";
		 $this->load->view('user/editProfile', $data);      
    }
    else
    {
		$this->load->model('Left_model');
		$data['email']=$this->Left_model->getProfile();
		$this->Left_model->set_profile();
		$data['message']="Sikeresen Rögzítetted a kérést!!!";
        redirect('/User/view/editProfile', 'refresh');

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

}