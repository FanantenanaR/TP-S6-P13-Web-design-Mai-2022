<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

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
        try {
			$this->load->library('email');
			$this->load->library('session');

					// The mail sending protocol.
			$config['protocol'] = 'smtp';
			// SMTP Server Address for Gmail.
			$config['smtp_host'] = "ssl://smtp.gmail.com";
			// SMTP Port - the port that you is required
			$config['smtp_port'] = 465;
			// SMTP Username like. (abc@gmail.com)
			$config['smtp_user'] = "fanantenanaran@gmail.com";
			// SMTP Password like (abc***##)
			$config['smtp_pass'] = "BlackRebelion?9";
			$this->email->initialize($config);
			$this->email->set_newline("\r\n");

			$this->email->from('fanantenanaran@gmail.com', 'Fanantenana Ran');
			$this->email->to('rlfanoela@gmail.com');
			// $this->email->cc('another@another-example.com');
			// $this->email->bcc('them@their-example.com');

			$this->email->subject('Email Test');
			$this->email->message('Valider e.');
			
			if($this->email->send())
				echo("Congragulation Email Send Successfully.");
			else
				echo("You have encountered an error");
		} catch (\Throwable $th) {
			echo $th;
		}
	}

	public function inscription(){

	}
}
