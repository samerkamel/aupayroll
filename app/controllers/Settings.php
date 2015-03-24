<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Settings extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        if ($this->session->userdata('language') != "" )
         $this->lang->load($this->session->userdata('language'), $this->session->userdata('language'));
        else $this->lang->load('default');
        $this->load->model('update_model');

    }
    public function index($status = NULL) {
       if(($this->session->userdata('user_name')!=""))
        {     
        $user_id = $this->session->userdata['id'];
        $user = $this->db->get_where('users', array('id'=> $user_id));
        $userdb = $user->row();
        $data = array('title' => 'Settings');
        $data['userdb']=$userdb;
        $data['status']=$status;
        
        $this->load->view('private/settings', $data);
          }
        else {
            redirect('dashboard');
        } 
    }
    public function update() {
        if($this->input->post('logo') !=""){
        $data = array(
        'name' => $this->input->post('name'),
        'logo' => $this->input->post('logo'),
        'refreshRate' => $this->input->post('refreshRate'),
        'refreshRateDebug' => $this->input->post('refreshRateDebug'),
        'timerPeriod' => $this->input->post('timerPeriod'),
        'timerPeriodDebug' => $this->input->post('timerPeriodDebug'),
        'violationmultiplier' => $this->input->post('violationmultiplier'),
        'violationperiod' => $this->input->post('violationperiod'),
        'alloweddiff' => $this->input->post('alloweddiff'),
        'time' => $this->input->post('time'),
        'servertime' => $this->input->post('servertime'),
        'smsaccountid' => $this->input->post('smsaccountid'),
        'smsauthtoken' => $this->input->post('smsauthtoken'),
        'confstartphase' =>$this->input->post('startphase'),
        'confphase1' =>$this->input->post('phasegroup1'),
        'confphase2' =>$this->input->post('phasegroup2'),
        'confphase3' =>$this->input->post('phasegroup3'), 
        'smsuser1'=>$this->input->post('smsuser1'),
        'smsuser2'=>$this->input->post('smsuser2'),
        'smsuser3'=>$this->input->post('smsuser3'),
        'commlost'=>$this->input->post('commlost'),
        'commlostsms'=>$this->input->post('commlostsms'),
        'onduringoff'=>$this->input->post('onduringoff'),
        'onduringoffsms'=>$this->input->post('onduringoffsms'),
        'offduringon'=>$this->input->post('offduringon'),
        'offduringonsms'=>$this->input->post('offduringonsms'),
        'rtc'=>$this->input->post('rtc'),
        'rtcsms'=>$this->input->post('rtcsms'),
        'initialization'=>$this->input->post('initialization'),
        'initializationsms'=>$this->input->post('initializationsms'),
        'smsfrom' =>$this->input->post('smsfrom')
        );}
        else{
         $data = array(
        'name' => $this->input->post('name'),
        'refreshRate' => $this->input->post('refreshRate'),
        'refreshRateDebug' => $this->input->post('refreshRateDebug'),
        'timerPeriod' => $this->input->post('timerPeriod'),
        'timerPeriodDebug' => $this->input->post('timerPeriodDebug'),
        'violationmultiplier' => $this->input->post('violationmultiplier'),
        'violationperiod' => $this->input->post('violationperiod'),
        'alloweddiff' => $this->input->post('alloweddiff'),
        'time' => $this->input->post('time'),
        'servertime' => $this->input->post('servertime'),
        'smsaccountid' => $this->input->post('smsaccountid'),
        'smsauthtoken' => $this->input->post('smsauthtoken'),
        'confstartphase' =>$this->input->post('startphase'),
        'confphase1' =>$this->input->post('phasegroup1'),
        'confphase2' =>$this->input->post('phasegroup2'),
        'confphase3' =>$this->input->post('phasegroup3'),
        'smsuser1'=>$this->input->post('smsuser1'),
        'smsuser2'=>$this->input->post('smsuser2'),
        'smsuser3'=>$this->input->post('smsuser3'),
        'commlost'=>$this->input->post('commlost'),
        'commlostsms'=>$this->input->post('commlostsms'),
        'onduringoff'=>$this->input->post('onduringoff'),
        'onduringoffsms'=>$this->input->post('onduringoffsms'),
        'offduringon'=>$this->input->post('offduringon'),
        'offduringonsms'=>$this->input->post('offduringonsms'),
        'rtc'=>$this->input->post('rtc'),
        'rtcsms'=>$this->input->post('rtcsms'),
        'initialization'=>$this->input->post('initialization'),
        'initializationsms'=>$this->input->post('initializationsms'),
        'smsfrom' =>$this->input->post('smsfrom')
        
        );   
        }
        $this->update_model->settings_update($data);


    }
}

