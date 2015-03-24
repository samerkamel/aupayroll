<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employees extends CI_Controller {
    function __construct() {
        parent::__construct();
        if ($this->session->userdata('language') != "" )
        {$this->lang->load($this->session->userdata('language'), $this->session->userdata('language'));}
        else {$this->lang->load('default');
        }
        $this->load->model('update_model');
    }
    public function index() {
        if(($this->session->userdata('user_name')!=""))
        {     
        $user_id = $this->session->userdata['id'];
        $user = $this->db->get_where('users', array('id'=> $user_id));
        $userdb = $user->row();
        $data = array('title' => $this->lang->line('atumsl_allusers'));
        $data['userdb']=$userdb;
        $this->load->view('private/users/all_users', $data);
          }
        else {
            redirect('dashboard');
        }  
    }
    public function view($user_id = NULL) {
       
    }
    public function update($status = NULL) {
        if(($this->session->userdata('user_name')!=""))
        {     
        $user_id = $this->session->userdata['id'];
        $user = $this->db->get_where('users', array('id'=> $user_id));
        $userdb = $user->row();
        $data = array('title' => $this->lang->line('atumsl_accountsettings'));
        $data['userdb']=$userdb;
        $data['status']=$status;
       
        $this->load->view('private/users/update', $data);
          }
        else {
            redirect('dashboard');
        } 
    }
    public function update_user() {
        if(($this->session->userdata('user_name')!=""))
        {
        $this->load->library('form_validation');
        // field name, error message, validation rules
        $this->form_validation->set_rules('username', 'username', 'trim|required|min_length[4]|xss_clean');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
        $this->form_validation->set_rules('firstname', 'firstname', 'trim|required');
        $this->form_validation->set_rules('lastname', 'firstname', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|min_length[4]|max_length[32]');
        $this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|matches[password]');
        
        if($this->form_validation->run() == FALSE)
                {
                    $this->update();
                }
                else
                {
                    if($this->input->post('password') != ""){
                    $user_id = $this->session->userdata['id'];
                    $data = array(
                    'username' => $this->input->post('username'),
                    'password' => md5($this->input->post('password')),
                    'firstname' => $this->input->post('firstname'),
                    'lastname' => $this->input->post('lastname'),
                    'email' => $this->input->post('email')
                                 );
                    }
                    else {
                         $user_id = $this->session->userdata['id'];
                    $data = array(
                    'username' => $this->input->post('username'),
                    'firstname' => $this->input->post('firstname'),
                    'lastname' => $this->input->post('lastname'),
                    'email' => $this->input->post('email')
                    );
                    }
                    $this->update_model->user_update($user_id,$data);
                } 
        }
        else {
            redirect('dashboard');
        } 
    }
    public function add(){
        if(($this->session->userdata('user_name')!=""))
        {     
        $user_id = $this->session->userdata['id'];
        $user = $this->db->get_where('users', array('id'=> $user_id));
        $userdb = $user->row();
        $data = array('title' => 'Add User');
        $data['userdb']=$userdb;
        $this->load->view('private/users/add', $data);
          }
        else {
            redirect('dashboard');
        } 
    }
    public function do_add (){
         if(($this->session->userdata('user_name')!=""))
        { 
          $this->load->library('form_validation');
        // field name, error message, validation rules
        $this->form_validation->set_rules('username', 'username', 'trim|required|min_length[4]|xss_clean');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
        $this->form_validation->set_rules('firstname', 'firstname', 'trim|required');
        $this->form_validation->set_rules('lastname', 'firstname', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[4]|max_length[32]');
        $this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');
        
        if($this->form_validation->run() == FALSE)
                {
                    $this->add();
                }
                else
                {
                    $user_id = $this->session->userdata['id'];
                    $data = array(
                    'username' => $this->input->post('username'),
                    'password' => md5($this->input->post('password')),
                    'firstname' => $this->input->post('firstname'),
                    'lastname' => $this->input->post('lastname'),
                    'email' => $this->input->post('email'),
                    'accesslevel' => $this->input->post('accesslevel')
                    );
                $this->update_model->add_user($data);}
          }
        else {
            redirect('dashboard');
    }}
    public function delete($user_id = NULL) {
        
    }
}
/* End of file users.php */
/* Location: ./application/controllers/users.php */