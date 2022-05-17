<?php 
      if(! defined('BASEPATH')) {
            exit('No direct script access allowed'); 
      }
?>

<?php
      class User extends CI_Controller {
            public function accueil(){
                  $this->load->model('Top');
                  $data = array();
                  $data['user_info'] = $this->Top->get_info();
                  //$this->layout->view('ma_vue',  $data);
                  var_dump($data);
            }
      }
?>