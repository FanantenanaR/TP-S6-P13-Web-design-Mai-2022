<?php 
    if(! defined('BASEPATH')) {
        exit('No direct script access allowed'); 
    }
    class Matierepremiere extends CI_Model{
        public function lister() {
            $this->db->reset_query();
            return $this->db->get("matierepremieredetails")->result_array();
        }

        public function listerEtatStock() {
            $this->db->reset_query();
            return $this->db->get("etatstockdetails")->result_array();
        }

        public function acheter($idMatierepremiere, $quantite, $prix, $date, $raison, $initialization=0){
            $this->db->reset_query();
            $data = array(
                "idmatierepremiere" => $idMatierepremiere,
                "quantiteentre" => $quantite,
                "prix" => $prix,
                "action" => $initialization,
            );
            if($date!==""){
                $data['dateheure'] = $date;
            }
            $data['raison'] = ($raison === "") ? "Achat de matiere premiere." : $raison;
            $data['action'] = ($initialization===0) ? 0 : 1;
            $this->db->insert("mouvementstock", $data);
        }

        public function ajouter($nom, $idUnite, $seuil = 0){
            $this->db->reset_query();
            $data =array(
                "nom" => $nom,
                "idunite" => $idUnite,
                "seuilperminute" => $seuil
            );
            $this->db->insert("matierepremiere", $data);
            $this->db->reset_query();
            $result = $this->db->get_where("matierepremiere", $data)->result_array();
            $this->acheter($result[0]['id'], 0, "", "Initialisation stock de ".$nom);
        }
        
        
    }
?>