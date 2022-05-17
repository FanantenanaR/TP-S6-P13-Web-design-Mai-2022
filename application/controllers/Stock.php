<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->model("Matierepremiere");
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function index(){
        $data['listMatierepremiere'] = $this->Matierepremiere->lister();
        $data['listEtatStock'] = $this->Matierepremiere->listerEtatStock();
        $data['sommeValeurStock'] = array_sum(array_column($data['listEtatStock'], "valeurmoyenne"));
		$this->load->view('matierepremiere', $data);
	}

	public function achat(){
        $data = array();
        $matierepremiere = $this->input->post("matierepremiere");
        $quaniteentre = $this->input->post("quantiteentre");
        $prix = $this->input->post("prixachat");
        $raison = $this->input->post("raison");
        $dateachat = $this->input->post("dateachat");
        $this->Matierepremiere->acheter($matierepremiere, $quaniteentre, $prix, $dateachat, $raison, 1);
		header("location: ".base_url("Stock"));
	}
}
