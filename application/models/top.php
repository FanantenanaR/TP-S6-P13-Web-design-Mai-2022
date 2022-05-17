<?php 
      if(! defined('BASEPATH')) {
            exit('No direct script access allowed'); 
      }
?>

<?php
      class Top extends CI_Model{
            public function get_info(){
                  return array('auteur' =>'Chuck Norris', 'date' => '24/07/05', 'email'=> 'email@ndd.fr');
            }
      }
?>