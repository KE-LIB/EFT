<?php
class Pages extends CI_Controller {
	   public function __construct()
       {
            parent::__construct();
            // Your own constructor code
       }

        public function view($page = 'EFT')
        {
			  if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		$this->load->database();
        $data['title'] = "Az Egyetemi Könyvtár Elektronikus Folyóirat Tartalomjegyzék Szolgáltatása"; // the title of the page
       echo "sajt";
		$this->load->model('Left_model');
		$resMain=$this->Left_model->getMainTitle();
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
			$this->load->view('pages/'.$page, $data);
		 $this->load->view('templates/footer', $data);
		 
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
		 $this->load->view('pages/EFT', $data);      
    }
    else
    {
		$this->Left_model->set_eft();
		$data['message']="Sikeresen Rögzítetted a kérést!!!";
        $this->load->view('pages/EFT', $data);

    }

	 $this->load->view('templates/footer', $data);
	}

}