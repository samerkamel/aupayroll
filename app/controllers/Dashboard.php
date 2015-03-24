<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller{
    
 public function __construct()
 {
  parent::__construct();
  $this->load->model('dashboard_model');
  $this->load->library('session');
  if ($this->session->userdata('language') != "" )
         $this->lang->load($this->session->userdata('language'), $this->session->userdata('language'));
  else $this->lang->load('default');
 }
 public function index()
 {
  if(($this->session->userdata('user_name')!=""))
  {
   $this->welcome();
  }
  else{
   $data['title']= 'Sign in';
   
   $this->load->view("login.php", $data);
   
  }
 }
 public function register()
 {
  if(($this->session->userdata('user_name')!=""))
  {
   $this->welcome();
  }
  else{
   $data['title']= 'register';
   
   $this->load->view("registration_view.php", $data);
   
  }
 }
 public function welcome()
 {
        if(($this->session->userdata('user_name')!=""))
  {     
        $user_id = $this->session->userdata['id'];
        $user = $this->db->get_where('users', array('id'=> $user_id));
        $userdb = $user->row();
        $data = array('title' => 'Dashboard');
        $data['userdb']=$userdb;
        $this->load->view('private/dashboard', $data);
          }
        else {
            $this->login();
        }
 }
 public function login()
 {
  $this->load->library('form_validation');
  $this->form_validation->set_rules('email_address', 'Your Email', 'trim|required|valid_email');
  $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
  $data['title']= 'Login';
  $this->load->view("login.php", $data);
  $email=$this->input->post('email');
  $password=md5($this->input->post('pass'));

  $result=$this->dashboard_model->login($email,$password);
  if($result)     { 
    $query = $this->db->get_where('users', array('email' => $email),1);
    $userdata = $query->row();
    $newdata = array(
                   'id'         => $userdata->id,
                   'username' => $userdata->username,
                   
                   'email'     => $email,
                   'logged_in' => TRUE
               );

        $this->session->set_userdata($newdata);
        redirect('dashboard');};
  
 }
 public function thank()
 {
     $this->login();
 }
 public function registration()
 {
  $this->load->library('form_validation');
  // field name, error message, validation rules
  $this->form_validation->set_rules('user_name', 'User Name', 'trim|required|min_length[4]|xss_clean');
  $this->form_validation->set_rules('email_address', 'Your Email', 'trim|required|valid_email');
  $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
  $this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');

  if($this->form_validation->run() == FALSE)
  {
   $this->register();
  }
  else
  {
   $this->dashboard_model->add_user();
   $this->thank();
  }
 }
 public function logout()
 {
  $newdata = array(
  'user_id'   =>'',
  'user_name'  =>'',
  'user_email'     => '',
  'logged_in' => FALSE,
  );
  $this->session->unset_userdata($newdata );
  $this->session->sess_destroy();
  $this->index();
 }
}

