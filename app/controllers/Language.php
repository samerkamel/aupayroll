<?php
class Language extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function set($language,$uri_1=NULL, $uri_2=NULL, $uri_3=NULL, $uri_4=NULL, $uri_5=NULL, $uri_6=NULL, $uri_7=NULL, $uri_8=NULL, $uri_9=NULL) {
        $this->session->unset_userdata('language');
        $this->session->set_userdata('language', $language);      
        redirect($uri_1."/".$uri_2."/".$uri_3."/".$uri_4."/".$uri_5."/".$uri_6."/".$uri_7."/".$uri_8."/".$uri_9."/");
    }
}
