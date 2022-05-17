<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Utilisateur');
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
		$this->login();
	}

	public function login(){
		$this->load->view('login');
	}

	public function inscription(){
		$this->load->view('inscription');
	}

	public function log(){
		$email = $this->input->post("myemail");
		$password = $this->input->post("mypassword");
		$data = array();
		$blankInput = "Veuillez remplir ce champs.";
		if($email == ""){
			$data['erreurMail'] = $blankInput;
			$this->load->view("login", $data);
		}
		elseif($password == ""){
			$data['mail'] = $email;
			$data['erreurPassword'] = $blankInput;
			$this->load->view("login", $data);
		}
		else {
			$result = $this->Utilisateur->login($email, $password);
			if(count($result) == 0) {
				$data['erreurConnexion'] = "Email ou mot de passe invalide.";
				$this->load->view("login", $data);
			}
			elseif($result[0]['isactive'] == 0){
				$data['personne'] = $result[0];
				$this->load->view("waitForMail", $data);
			}
			elseif($result[0]['issuper']==1){
				$data['personne'] = $result[0];
				$this->validation();
			}
			else {
				$data['personne'] = $result[0];
				$this->load->view("Accueil", $data);
			}
		}
		
	}

	public function register(){
		$blankInput = "Veuillez remplir ce champs.";
		$nom = trim($this->input->post("nom")); 
		if($nom == "")	{
			$data['erreurNom'] = $blankInput;
			$this->load->view("inscription", $data);
		}
		else {
			$password = $this->input->post("password");
			$repassword = $this->input->post("repassword");
			if($password === "" || $repassword === ""){
				$data['nom'] = $nom;
				$data['erreurPassword'] = "Veuillez remplir ces champs.";
				$this->load->view("inscription", $data);
			}
			elseif($password !== $repassword){
				$data['nom'] = $nom;
				$data['erreurPassword'] = "Les 2 mots de passe que vous avez écrit sont différentes.";
				$this->load->view("inscription", $data);
			}
			else {
				$email = $this->input->post("email");
				
				if($email == ""){
					$data['nom'] = $nom;
					$data['erreurMail'] = $blankInput;
					$this->load->view("inscription", $data);
					
				}
				elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
					$data['nom'] = $nom;
					$data['email'] = $email;
					$data['erreurMail'] = "L'email saisi est invalide ou ne respecte pas le format valide.";
					$this->load->view("inscription", $data);
				}
				elseif($this->Utilisateur->alreadyIn($email)) {
					$data['nom'] = $nom;
					$data['email'] = $email;
					$data['erreurMail'] = "L'email saisi est déjà lié à un compte.";
					$this->load->view("inscription",  $data);
				}
				else {
					try {
						$this->Utilisateur->inscription($nom, $email, $password);
						$result = $this->Utilisateur->login($email, $password);
						$data['personne'] = $result[0];
						$data['nouvelle'] = "oui";
						$this->load->view("waitForMail", $data);
					} catch (\Throwable $th) {
						$data['nom'] = $nom;
						$data['email'] = $email;
						$data['erreurConnexion'] = "Une erreur s'est produite, veuillez reessayer dans quelques instants.";
						$this->load->view("inscription", $data);
					}
				}
			}
		
		}
		
		

		
	}

	public function validation($valided = -1, $nomUtilisateur="", $emailUtilisateur="", $isDesact = 0){
		$data = array();
		if($valided!=-1){
			$data['senttomail'] = $emailUtilisateur;
			if($isDesact==0){
				$data['validedSuccess'] = $nomUtilisateur;
			}
			else {
				$data['desactivatedSuccess'] = $nomUtilisateur;
			}
		}
		$data['listeUtilisateurs'] = $this->Utilisateur->listeUtilisateur();
		$this->load->view('depart', $data);
	}

	public function valider($id){
		$idUtilisateur = $id;
		$this->Utilisateur->activate($idUtilisateur);
		$user = $this->Utilisateur->getById($idUtilisateur)[0];
		$this->validation($idUtilisateur, $user['nom'], $user['email']);
	}

	public function desactiver($id){
		$idUtilisateur = $id;
		$this->Utilisateur->desactiver($idUtilisateur);
		$user = $this->Utilisateur->getById($idUtilisateur)[0];
		$this->validation($idUtilisateur, $user['nom'], $user['email'], 1);
	}
}
