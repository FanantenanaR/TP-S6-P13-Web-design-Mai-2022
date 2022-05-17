<?php 
    if(! defined('BASEPATH')) {
        exit('No direct script access allowed'); 
    }
    class Unite extends CI_Model{
        public function lister() {
            $this->db->reset_query();
            return $this->db->get("unite")->result_array();
        }

        public function ajouter($nom, $diminutif, $convertgramme){
            $this->db->reset_query();
            $this->bd->insert("unite", array(
                "nom" => $nom,
                "diminutif" => $diminutif,
                "convertgramme" => $convertgramme
            ));
        }
    }
?>