<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller {

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
	public function index($id){
		$data['page']='article';
		$data['title'] = 'Article';
		$this->load->model('Article');
		$data['article'] = $this->Article->get(array('id'=>$id))[0];
		$data['listContenue'] = $this->Article->getContent(array('idarticle'=> $id));
		$this->load->view('FO-template', $data);
	}

	
}
?>