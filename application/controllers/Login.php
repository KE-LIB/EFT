<?php
class Login extends CI_Controller {

        public function view($page = 'login')
        {
			  if ( ! file_exists(APPPATH.'views/login/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		$this->load->database();
		 $data['title'] = "Az Egyetemi Könyvtár Elektronikus Folyóirat Tartalomjegyzék Szolgáltatása"; // the title of the page
		$this->load->view('templates/headerLogin', $data);
		$this->load->view('login/'.$page, $data);
		$this->load->view('templates/footerLogin', $data);
       
       
		
		}
public function loginUser()
	{
	$this->load->helper('form'); 
    $this->load->library('form_validation');
	//$this->load->library('ldap_auth');
	$this->load->library('adLDAP');
	
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $data['title'] = "Az Egyetemi Könyvtár Elektronikus Folyóirat Tartalomjegyzék Szolgáltatása"; // the title of the page

		
 if ($this->form_validation->run() === FALSE)
    {
		$data['message']="A mezők kitöltése kötelező";
		 $this->load->view('login/login', $data);      
    }
    else
    {
		$user=$this->input->post('username');
		$pass=$this->input->post('password');
		$res=0;
		$adldap = new adLDAP();
		$adldap->connect();
		$res = $adldap->authenticate($user,$pass,$prevent_rebind=false);
		
		/*$res=$this->ldap_auth->auth($user, $pass);
		echo $user;
		$info=$this->ldap_auth->info($user);
		$res=$this->ldap_auth->info($user);
		print_r($info);*/
		if($res==1)
		{
		$this->load->model('Left_model');
		$resMain=$this->Left_model->getMainTitle();
		$userdata=$this->Left_model->getUserIdLdap();
		set_cookie('uid',$userdata,0);
		$_COOKIE['uid']=$userdata;
		$data['terulet']=$resMain;
		if($this->Left_model->isAdmin($_COOKIE['uid']))
		{
			 $this->load->view('templates/headerAdmin', $data);
		}
		else{
			 $this->load->view('templates/header', $data);
		}
		
			if (isset($_GET['keres']))
			{
				
			$resChild=$this->Left_model->getChild($_GET['keres']);
			$data['child']=$resChild;
			$mainTitle=$this->Left_model->getSelectedTitle($_GET['keres']);
			$data['selectedTitle']=$mainTitle;
			$childchild=$this->Left_model->getChildrenChild($_GET['keres']);
			$data['childchild']=$childchild;
			}
		set_cookie('user',$user,0);
		$_COOKIE['user']=$user;
		$data['message']="Üdvözlöm!";
		$this->load->view('user/EFT', $data);
		}
		else 
		{
			 $this->load->view('templates/headerLogin', $data);
		$data['message']="Hibás felhasználónév vagy jelszó";
		$this->load->view('login/login', $data);   	
		}
	}
    $this->load->view('templates/footerLogin', $data);
       
		}
}