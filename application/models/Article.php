<?php 
    if(! defined('BASEPATH')) {
        exit('No direct script access allowed'); 
    }
    class Article extends CI_Model{
        public function getAll() {
            $reponse = $this->db->get('varticle')->result_array();
            return $reponse;
        }

    }