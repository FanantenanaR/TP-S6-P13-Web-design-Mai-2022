<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backoffice extends CI_Controller {
    public function __construct(){
		parent::__construct();
	}

    public function index(){
        $data = array();

        $data['title'] = "Accueil";
        $data['page'] = "index";
        $this->load->view('BO-template.php', $data);
    }
}