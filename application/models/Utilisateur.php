<?php 
    if(! defined('BASEPATH')) {
        exit('No direct script access allowed'); 
    }

    class Utilisateur extends CI_Model{
        public function login($email, $password){
            $this->db->reset_query();
            $this->db->select("id, nom, email, isactive, issuper");
            return $this->db->get_where("utilisateurs", array("email"=> $email, "password"=> md5($password)))->result_array();
        }

        public function inscription($nom, $email, $password){
            $this->db->reset_query();
            $elt = array(
                "nom" => trim($nom),
                "email" => $email,
                "password" => md5($password)
            );
            $this->db->insert("utilisateurs", $elt);
        }

        public function alreadyIn($email){
            $this->db->reset_query();
            $this->db->select("email");
            $nombre = count($this->db->get_where("utilisateurs", array("email"=>$email))->result_array());
            if($nombre > 0){
                return true;
            }
            return false;
        }

        public function listeUtilisateur(){
            $this->db->reset_query();
            $this->db->select("id, nom, email, password, isactive, issuper, isemailsent, nombreemailsent ");
            return $this->db->get("viewutilisateurs")->result_array();
        }

        public function getById($id){
            $this->db->reset_query();
            $this->db->select("id, nom, email, password, isactive, issuper, isemailsent, nombreemailsent ");
            return $this->db->get_where("viewutilisateurs", array("id"=> $id))->result_array();
        }

        public function activate($id){
            $this->db->reset_query();
            $this->db->set(array(
                "isactive" => 1
            ));
            $this->db->where(array(
                "id"=>$id
            ));
            $this->db->update("utilisateurs");
        }

        public function desactiver($id){
            $this->db->reset_query();
            $this->db->set(array(
                "isactive" => 0
            ));
            $this->db->where(array(
                "id"=>$id
            ));
            $this->db->update("utilisateurs");
        }
    }
?>