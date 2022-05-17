<?php 
    if(! defined('BASEPATH')) {
        exit('No direct script access allowed'); 
    }
    class Article extends CI_Model{
        public function getAll() {
            $reponse = $this->db->get('varticle')->result_array();
            return $reponse;
        }

        public function get3Lastest(){
            $reponse = $this->db->get('varticle3lastest')->result_array();
            return $reponse;
        }

        public function get($where){
            $reponse = $this->db->get_where('varticle', $where)->result_array();
            return $reponse;
        }

        public function getContent($where){
            $this->db->order_by('ordre', 'asc');
            $reponse = $this->db->get_where('vcontenue', $where)->result_array();
            return $reponse;
        }

    }