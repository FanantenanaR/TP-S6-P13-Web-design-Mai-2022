<?php 
    if(! defined('BASEPATH')) {
        exit('No direct script access allowed'); 
    }
    class CategorieModel extends CI_Model{
        public function getAll() {
            $reponse = $this->db->get('categorie')->result_array();
            return $reponse;
        }

    }